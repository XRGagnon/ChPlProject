<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 15/02/2019
 * Time: 6:50 PM
 */
include_once "../DBManager/ConnectionMaker.php";
include_once "../DBManager/DBManager.php";
include_once "../Models/Security.php";
class Utility
{
    //Send mail to assigned email
    public static function contact($destination,$subj, $message, $origin,$name )
    {
        //Mail function not working from a Local server, cannot be tested for sure
        $message .= "<br/> Message from: ".$origin;
        $message .= "<br/> Sender Name: ".$name;
        mail($destination,$subj,$message);
    }

    //Handle completed transaction
    public static function manageOrder($xmlObject, $userId)
    {
        //
        $orderItems = array();
        $totalPrice = 0;
        //iterate through each node in the XML object containing all the transaction info
        foreach ($xmlObject->children() as $child)
        {
            $name = $child->getName();
            //Operate only on the order items node
            if ($name == "order-items")
            {
                foreach ($child->children() as $item)
                {
                    //Convert the xml to an array of ordered items
                    $code = $item->children()[0][0]->__toString();
                    $qty = $item->quantity[0]->__toString();
                    $price = $item->price[0]->__toString();
                    $itemTotal = $qty * $price;
                    $totalPrice += $itemTotal;
                    $newItem = array($code, $qty);
                    array_push($orderItems,$newItem);

                }
            }
        }
        //Insert the transaction and transaction items
    self::createTransaction($userId,$orderItems,$totalPrice);
    }

    //Insert the transcaction and transaction items
    public static function createTransaction($user_id,$itemArray,$totalPrice)
    {
        $success = true;
        $conn = ConnectionMaker::getConnection();
        $error = "";
        //SQL statement
        $insertTransactionSQL = "INSERT INTO TRANSACTION(USER_ID, DATE, TOTAL) VALUES (?,?,?);";
        $transactionStatement = $conn->prepare($insertTransactionSQL);
        $date = date("Y-m-d");
        $id = (int)$user_id;
        $transactionStatement->bind_param("isd",$id,$date,$totalPrice);

        //If main transaction was successful
        if ($transactionStatement->execute())
        {
            $transactionId = $conn->insert_id;
            for ($i = 0; $i < sizeof($itemArray); $i++)
            {
                //Item insertion SQL statement for each item
                $insertItemsSQL = "INSERT INTO TRANSACTION_ITEM VALUES (?,?,?)";
                $itemStatement = $conn->prepare($insertItemsSQL);
                $itemStatement->bind_param("isi",$transactionId,$itemArray[$i][0], $itemArray[$i][1]);
                if (!$itemStatement->execute())
                {
                    //If any item fails, success is false
                    $success = false;
                    $error = $itemStatement->error;
                }
            }
        }
        else
            {
            $success = false;
            $error = $transactionStatement->error;
        }
        if (!$success)
        {
            //If transaction failed, echo error. For debug purposes only.
            //echo $error;
        }
    }
}