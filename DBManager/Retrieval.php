<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 25/01/2019
 * Time: 3:17 PM
 */

class Retrieval
{
    //This class has all the methods to retrieve data from the Database

    //This method returns all categories from the Database
    static function getCategories()
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM CATEGORY;";

        $result = $conn->query($sql);

        if ($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    //This method returns all subcategories contained in the parent category
    static function getCatSubs($parentCat)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM Category WHERE Parent_Category = ".$parentCat.";";


        $result = $conn->query($sql);

        if ($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    //This method returns all items contained in the parent category
    static function getCatItems($parentCat)
    {
        $sql = "";
        if (strpos("sc",$parentCat))
        {
            $sql = "SELECT * FROM ITEM WHERE SUBCATEGORY = '".$parentCat."';";
        }
        else
        {
            $sql = "SELECT * FROM ITEM WHERE CATEGORY = '".$parentCat."' AND SUBCATEGORY = NULL;";
        }
        $conn = ConnectionMaker::getConnection();


        $result = $conn->query($sql);

        if ($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    static function getCategory($cat)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM CATEGORY WHERE CATEGORY = '".$cat."' LIMIT 1;";

        $result = $conn->query($sql);

        if ($result)
        {

            return $result->fetch_assoc();
        }
        else
        {
            return false;
        }
    }

    static function getItem($item)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM ITEM WHERE ITEM_NO = '".$item."' LIMIT 1;";

        $result = $conn->query($sql);

        if ($result)
        {

            return $result->fetch_assoc();
        }
        else
        {
            return false;
        }
    }

    static function getSearchResult($searchString)
    {
        $conn = ConnectionMaker::getConnection();

        $queryString = explode("+",$searchString);

        $count = 0;
        $sql = "SELECT * FROM ITEM WHERE";
        foreach ($queryString as $searchVar)
        {
            if ($count != 0)
            {
                $sql .= " AND ";

            }
            $sql .= " Item_no like '%".$searchVar."%' OR Title_English like '%".$searchVar."%'";
            $count++;
        }
        $sql .= ";";

        $result = $conn->query($sql);

        if ($result)
        {

            return $result;
        }
        else
        {
            return false;
        }
    }

    static function getUser($userId)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM USER WHERE USER_ID = '".$userId."' LIMIT 1;";

        $result = $conn->query($sql);

        if ($result)
        {

            return $result->fetch_assoc();
        }
        else
        {
            return false;
        }
    }

    static function getUserTransaction($userId)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM TRANSACTION WHERE USER_ID = '".$userId."';";

        $result = $conn->query($sql);

        if ($result)
        {

            return $result;
        }
        else
        {
            return false;
        }
    }
    static function getUserTransactionItems($transId)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM Transaction_Item WHERE Transaction_Id = '".$transId."';";

        $result = $conn->query($sql);

        if ($result)
        {

            return $result;
        }
        else
        {
            return false;
        }
    }


}