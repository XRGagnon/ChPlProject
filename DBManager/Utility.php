<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 15/02/2019
 * Time: 6:50 PM
 */

class Utility
{
    public static function contact($destination,$subj, $message, $origin,$name )
    {
        $message .= "<br/> Message from: ".$origin;
        $message .= "<br/> Sender Name: ".$name;
        mail($destination,$subj,$message);
    }
}