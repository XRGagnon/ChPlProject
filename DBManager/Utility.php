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
    public static function contact($destination,$subj, $message, $origin,$name )
    {
        $message .= "<br/> Message from: ".$origin;
        $message .= "<br/> Sender Name: ".$name;
        mail($destination,$subj,$message);
    }

    public static function manageOrder($xmlObject, $userId)
    {
        $orderItems = array();
        $totalPrice = 0;
        foreach ($xmlObject->children() as $child)
        {
            $name = $child->getName();
            if ($name == "order-items")
            {
                foreach ($child->children() as $item)
                {

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
    self::createTransaction($userId,$orderItems,$totalPrice);
    }

    public static function createTransaction($user_id,$itemArray,$totalPrice)
    {
        $success = true;
        $conn = ConnectionMaker::getConnection();
        $error = "";
        $insertTransactionSQL = "INSERT INTO TRANSACTION(USER_ID, DATE, TOTAL) VALUES (?,?,?);";
        $transactionStatement = $conn->prepare($insertTransactionSQL);
        $date = date("Y-m-d");
        $id = (int)$user_id;
        $transactionStatement->bind_param("isd",$id,$date,$totalPrice);

        if ($transactionStatement->execute())
        {
            $transactionId = $conn->insert_id;
            for ($i = 0; $i < sizeof($itemArray); $i++)
            {

                $insertItemsSQL = "INSERT INTO TRANSACTION_ITEM VALUES (?,?,?)";
                $itemStatement = $conn->prepare($insertItemsSQL);
                $itemStatement->bind_param("isi",$transactionId,$itemArray[$i][0], $itemArray[$i][1]);
                if (!$itemStatement->execute())
                {
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
            echo $error;
        }
    }
}