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
                    array_push($orderItems,$item);
                    $qty = end($orderItems)[0]["quantity"];
                    $price = end($orderItems)[0]["price"];
                    $total = (int)$qty*(double)$price;
                    $totalPrice += $total;
                    //TODO RESUME FROM HERE FIX XML
                }
            }
        }
        $itemCode = (string)$orderItems[0][0]->child;
    self::createTransaction($userId);
    }

    public static function createTransaction($user_id)
    {
        $conn = ConnectionMaker::getConnection();
        $conn->insert_id;
    }
}