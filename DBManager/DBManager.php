<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:27 AM
 */
session_start();
 
include_once "../DBManager/ConnectionMaker.php";
include_once "../Models/Defaults.php";
class DBManager
{


    ///////////////////////// Reports Section ///////////////////////////////////////
    // This includes Summary, Detail and Exception

    /*
    Summary of the Summary Report
    - Retrieves information from users wh registered by the specified date
    */
    function Summary($DATEVARIABLE)
    {
        $conn = ConnectionMaker::getConnection();

        //write the sql query
        $sql = "SELECT * FROM USER, TRANSACTIONS, CART
		WHERE TRANSACTIONS.Transaction_ID = USER.User_ID
		And TRANSACTIONS.Cart_ID = CART.Cart_Id
		And TRANSACTIONS.Transaction_Date >" . $DATEVARIABLE;

        //get the result form the sql query
        $result = $conn->query($sql);

        //check to see if there are any rows returned from the query
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$row";
            }
        } else {
            echo "There were no records returned for the specified date";
        }

    }


    /* Summary of Detail Report
    - Used for when a detail report wants to be printed
    - Prints out user info with their transactions made and cart info
    - Prints out all user info
    - Prints out information on any changes made with the user who made them and on what item
    */
    function Detail($DATEVARIABLE)
    {
        $conn = ConnectionMaker::getConnection();

        //Write the three queries
        $sql = "SELECT * FROM USER, TRANSACTIONS, CART
		WHERE TRANSACTIONS.Transaction_ID = USER.User_ID
		And TRANSACTIONS.Cart_ID = CART.Cart_Id
		And TRANSACTIONS.Transaction_Date >" . $DATEVARIABLE;

        $sql2 = "SELECT * FROM USER";

        $sql3 = "SELECT * FROM CHANGES, USER, ITEM
		WHERE CHANGES.Item_ID = ITEM.Item_ID
		And CHANGES.User_ID = USER.User_ID
		And CHANGES.Change_Date >" . $DATEVARIABLE;

        //get the result from the query
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);

        //check to see if anything is returned ---------Result 1
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$row";
            }
        } else {
            echo "There were no records returned for the specified date";
        }

        //check to see if anything is returned ---------Result 2
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$row";
            }
        } else {
            echo "Something went wrong trying to get User Information";
        }

        //check to see if anything is returned ---------Result 3
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$row";
            }
        } else {
            echo "There were no records returned for the specified date";
        }
    }

    function Exception($DATEVARIABLE, $NUMBERVARIABLE)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM USER, TRANSACTION, CART
		WHERE  TRANSACTION.Transaction_ID = USER.User_ID
		And TRANSACTION.Cart_ID = CART.Cart_Id
		AND TRANSACTION.Total_cost > " . $NUMBERVARIABLE . ";";

        $sql2 = "SELECT * FROM USER
		Where Date_Added > " . $DATEVARIABLE . ";";

        $sql3 = "SELECT * FROM CHANGES, USER, ITEM
		WHERE CHANGES.Item_ID = ITEM.Item_ID
		And CHANGES.User_ID = USER.User_ID
		And CHANGES.Change_Info = 'ADD'
		OR CHANGES.Change_Info = 'REMOVE';";

        //get the result from the query
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);

        //check to see if anything is returned ---------Result 1
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$row";
            }
        } else {
            echo "There were no records returned for the specified date";
        }

        //check to see if anything is returned ---------Result 2
        if ($result2->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$row";
            }
        } else {
            echo "There are no records returned for the specified date";
        }

        //check to see if anything is returned ---------Result 3
        if ($result3->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$row";
            }
        } else {
            echo "There were no records returned for the specified date";
        }
    }
	
//////////////////////////////// Procedures section ////////////////////////////////////
    // This includes Login, Register
    //Secure login
    /* Summary of Login function
  -Used for when user wants to log in
  -Checks if user exist, if user does then the login is performed
  -If user does not exist, puts and error for password or email
  */
    static function Login($user, $password)
    {
        $conn = ConnectionMaker::getConnection();
        // Using prepared statements means that SQL injection is not possible.
        if ($stmt = $conn->prepare("SELECT User_ID, Username, User_Password 
        FROM user
       WHERE Username = ?
        LIMIT 1")) {
            $stmt->bind_param('s', $user);  // Bind "$user" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();

            // get variables from result.
            $stmt->bind_result($user_id, $username, $db_password);
            $stmt->fetch();

            if ($stmt->num_rows == 1) {

                // Check if the password in the database matches
                // the password the user submitted. We are using
                // the password_verify function to avoid timing attacks.
                $pEq = ($password == $db_password);
                if ($pEq) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/",
                        "",
                        $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512',
                        $db_password . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    return false;
                }

            } else {
                // No user exists.
                return false;
            }
        }
    }

    /* Summary of Register function
    -Used for when a user wants to create an account
    -Checks if Username exists, if it does, give an error
    -Checks if Email exists, if it does, give an error
    -If Username and email do not exist, user account is created
    */
    function Register($Email, $FName, $LName, $Username, $Password, $User_Type, $Date)
    {
        $conn = ConnectionMaker::getConnection();

        //write the query for creating the database
        $sql = "INSERT INTO TABLE USER
		VALUES ($Email, $FName, $LName, $Username, $Password, $User_Type, $Date)";

        //write the query for checking if Username Exists
        $sqlCheckUsername = "SELECT Username FROM USER
		WHERE Username = '$Username'";

        //Write the query for checking if Email Exists
        $sqlCheckEmail = "SELECT Email User_Email FROM USER
		WHERE User_Email = '$Email'";

        //get result from the user query
        $resultUsername = $conn->query($sqlCheckUsername);

        //get result from email query
        $resultEmail = $conn->query($sqlCheckEmail);

        if ($resultUsername->num_rows = 0) {
            if ($resultEmail->num_rows = 0) {
                if ($conn->query($sql) === TRUE) {
                    echo "You have Registered Successfully";
                    header('Location: placeholder.url');
                } else {
                    echo "Something went wrong, try again later";
                }
            } else {
                echo "That Email already exists";
            }
        } else {
            echo "That Username already exists";
        }
    }


    function Cart($USERVARIABLE)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "SELECT Item_No, Title_English, Title_French, Item_Qty, Item_Price * Item_Qty AS Cost FROM CART_ITEM, CART, ITEM, USER
		WHERE USER.User_ID = CART.User_ID
		And CART.Cart_ID = CART_ITEM.Cart_ID
		And CART_ITEM.Item_ID = ITEM.Item_ID
		And USER.User_ID = " . $USERVARIABLE . ";";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$row";
            }
        } else {
            echo "you do not have anything in your cart";
        }
    }

    function Add_Item($Item_No, $Cat_ID, $Sub_Cat_ID, $Availability, $New, $Colors, 
					$Title_English, $Description_English, $Title_French, $Description_French, 
					$Country_Of_Origin, $Spare_Parts, $Large_Image, $Large_Image_Text, $Small_Image,
					$Small_Image_Text, $Instructions, $Price)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = $conn->prepare("INSERT INTO TABLE ITEM 
		VALUES ( ? , ? , ? , ? , ? , ? , ? , ?	, ? , ? , ?
		, ? , ? , ? , ? , ? , ? , ? );");
		
		$sql->bind_param("ssssisssssssbsbssd", $Item_No, $Cat_ID, $Sub_Cat_ID, $Availability, $New, $Colors, 
					$Title_English, $Description_English, $Title_French, $Description_French, 
					$Country_Of_Origin, $Spare_Parts, $Large_Image, $Large_Image_Text, $Small_Image,
					$Small_Image_Text, $Instructions, $Price);
		
		$Check_For_ItemNo = "SELECT Item_No FROM ITEM
							WHERE Item_No = ". $Item_No . ";";
							
		$Check_For_Title_English = "SELECT Title_English FROM ITEM
							WHERE Title_English = ". $Title_English . ";";
							
		$Check_For_Title_French = "SELECT Title_French FROM ITEM
							WHERE Title_French = ". $Title_French . ";";	

		$result2 = $conn->query($Check_For_ItemNo);
		$result3 = $conn->query($Check_For_Title_English);
		$result4 = $conn->query($Check_For_Title_French);

		if ($result2->num_rows == 0) {
			if ($result3->num_rows == 0) {
				if ($result4->num_rows == 0) {
					if ($sql->execute()) {
						echo "Item Added Successfully";
					}
					else {
						echo "Something went wrong, try again later";
					}					
				}
				else
				{
					echo "There is already an Item that has that French Title";
				}
			}
			else{
				echo "There is already an Item that has that English Title";
			}			
		}
		else{
			echo "There is already an Item with that Item Number";
		}
    }

    function Update_Item($Old_Item_No,$Item_No, $Cat_ID, $Sub_Cat_ID, $Availability, $New, $Colors, 
					$Title_English, $Description_English, $Title_French, $Description_French, 
					$Country_Of_Origin, $Spare_Parts, $Large_Image, $Large_Image_Text, $Small_Image,
					$Small_Image_Text, $Instructions, $Price)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "Update ITEM
		Set Item_No = ? , Category = ? , SubCategory = ? 
		, Availability = ? , New = ? , Colors = ? 
		, Title_English = ? , Description_English = ? 
		, Title_French = ? , Description_French = ? 
		, Country_Of_Origin = ? , Spare_Parts = ? 
		, Large_Image = ? , Large_Image_Text = ? 
		, Small_Image = ? , Small_Image_Text = ?
		, Instructions = ? , Price = ? 
		Where Item_No =  " . $Old_Item_No ." ;";
		
		$sql->bind_param("ssssisssssssbsbssd", $Item_No, $Cat_ID, $Sub_Cat_ID, $Availability, $New, $Colors, 
					$Title_English, $Description_English, $Title_French, $Description_French, 
					$Country_Of_Origin, $Spare_Parts, $Large_Image, $Large_Image_Text, $Small_Image,
					$Small_Image_Text, $Instructions, $Price);

		$Check_For_ItemNo = "SELECT Item_No FROM ITEM
							WHERE Item_No = ". $Item_No . ";";
							
		$Check_For_Title_English = "SELECT Title_English FROM ITEM
							WHERE Title_English = ". $Title_English . ";";
							
		$Check_For_Title_French = "SELECT Title_French FROM ITEM
							WHERE Title_French = ". $Title_French . ";";	

		$result2 = $conn->query($Check_For_ItemNo);
		$result3 = $conn->query($Check_For_Title_English);
		$result4 = $conn->query($Check_For_Title_French);

		if ($result2->num_rows == 0) {
			if ($result3->num_rows == 0) {
				if ($result4->num_rows == 0) {
					if ($sql->execute()) {
						echo "Item Added Successfully";
					}
					else {
						echo "Something went wrong, try again later";
					}					
				}
				else
				{
					echo "There is already an Item that has that French Title";
				}
			}
			else{
				echo "There is already an Item that has that English Title";
			}			
		}
		else{
			echo "There is already an Item with that Item Number";
		}
    }

    function Remove_Item($ItemIdVariable)
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "DELETE FROM ITEM
		Where 
		Item_No = " . $ItemIdVariable . ";";

        if ($conn->query($sql) === true) {
            echo "Item has been successfully updated";
        } else {
            echo "Something went wrong, please try again another time";
        }
    }

    // This Function needs a little review, not sure in what context this is used
    static function View_Items()
    {
        $conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM ITEM;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
			echo "<div style='overflow-x:auto'>";
			echo "<table id='viewall'>";	
			echo "<tr>";
				echo "<th>Item_No</th>";
				echo "<th>Category</th>";
				echo "<th>Sub Category</th>";
				echo "<th>Availability</th>";
				echo "<th>New</th>";
				echo "<th>Colors</th>";
				echo "<th>Title_English</th>";
				echo "<th>Description_English</th>";
				echo "<th>Title French</th>";
				echo "<th>Description French</th>";
				echo "<th>Country Of Origin</th>";
				echo "<th>Spare Parts</th>";
				echo "<th>Large Image</th>";
				echo "<th>Large Image Text</th>";
				echo "<th>Small Image</th>";
				echo "<th>Small Image Text</th>";
				echo "<th>Instructions</th>";
				echo "<th>Price</th>";
				echo "<th>Remove Item</th><th>Edit Item</th>";
			echo "</tr>";		
            while ($row = $result->fetch_assoc()) {

				echo "<tr>";
				foreach($row as $val)
				{
					echo "<td>";
					if(!isset($val))
					{
						print_r('');
					}
					else
					{
						print_r($val);
					}
					echo "</td>";
				}
				$id = reset($row);
				echo '<td><a href="RemoveItem.php?id=' . $id . '">Remove Item</a><td>'; 
				echo "</tr>";
            }
			echo "</table>";
			echo "</div>";
        } else 
		{
            echo "Nothing could be displayed at this time, try again later";
        }
    }
	
	static function View_One_Item($SEARCH)
	{
		$conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM ITEM WHERE Item_No = '" . $SEARCH . "';";
		$sql2 = "SELECT * FROM ITEM WHERE Title_English = '" . $SEARCH . "';";
		$sql3 = "SELECT * FROM ITEM WHERE Title_French = '" . $SEARCH . "';";
		$sql4 = "SELECT * FROM ITEM,CATEGORY 
				WHERE ITEM.SubCategory = CATEGORY.Category
				AND CATEGORY.EnglishCat = '" . $SEARCH . "';";
		$sql5 = "SELECT * FROM ITEM,CATEGORY 
				WHERE ITEM.SubCategory = CATEGORY.Category
				AND CATEGORY.FrenchCat = '" . $SEARCH . "';";				

        $result = $conn->query($sql);
		$result2 = $conn->query($sql2);
		$result3 = $conn->query($sql3);
		$result4 = $conn->query($sql4);
		$result5 = $conn->query($sql5);		
		
		echo "<div style='overflow-x:auto'>";
			echo "<table id='viewall'>";	
			echo "<tr>";
				echo "<th>Item_No</th>";
				echo "<th>Category</th>";
				echo "<th>Sub Category</th>";
				echo "<th>Availability</th>";
				echo "<th>New</th>";
				echo "<th>Colors</th>";
				echo "<th>Title_English</th>";
				echo "<th>Description_English</th>";
				echo "<th>Title French</th>";
				echo "<th>Description French</th>";
				echo "<th>Country Of Origin</th>";
				echo "<th>Spare Parts</th>";
				echo "<th>Large Image</th>";
				echo "<th>Large Image Text</th>";
				echo "<th>Small Image</th>";
				echo "<th>Small Image Text</th>";
				echo "<th>Instructions</th>";
				echo "<th>Price</th>";
				echo "<th>Remove Item</th><th>Edit Item</th>";
			echo "</tr>";
        if ($result->num_rows > 0) {
		
            while ($row = $result->fetch_assoc()) {

				echo "<tr>";
				foreach($row as $val)
				{
					echo "<td>";
					if(!isset($val))
					{
						print_r('');
					}
					else
					{
						print_r($val);
					}
					echo "</td>";
				}
				$id = reset($row);
				echo '<td><a href="RemoveItem.php?id=' . $id . '">Remove Item</a><td>'; 
				echo "</tr>";
            }
        } else 
		if ($result2->num_rows > 0) {
		
            while ($row = $result->fetch_assoc()) {

				echo "<tr>";
				foreach($row as $val)
				{
					echo "<td>";
					if(!isset($val))
					{
						print_r('');
					}
					else
					{
						print_r($val);
					}
					echo "</td>";
				}
				$id = reset($row);
				echo '<td><a href="RemoveItem.php?id=' . $id . '">Remove Item</a><td>'; 
				echo "</tr>";
            }

        } else 
		if ($result3->num_rows > 0) {
		
            while ($row = $result->fetch_assoc()) {

				echo "<tr>";
				foreach($row as $val)
				{
					echo "<td>";
					if(!isset($val))
					{
						print_r('');
					}
					else
					{
						print_r($val);
					}
					echo "</td>";
				}
				$id = reset($row);
				echo '<td><a href="RemoveItem.php?id=' . $id . '">Remove Item</a><td>'; 
				echo "</tr>";
            }

        } else
		if ($result4->num_rows > 0) {
		
            while ($row = $result->fetch_assoc()) {

				echo "<tr>";
				foreach($row as $val)
				{
					echo "<td>";
					if(!isset($val))
					{
						print_r('');
					}
					else
					{
						print_r($val);
					}
					echo "</td>";
				}
				$id = reset($row);
				echo '<td><a href="RemoveItem.php?id=' . $id . '">Remove Item</a><td>'; 
				echo "</tr>";
            }

        } else
		if ($result5->num_rows > 0) {
		
            while ($row = $result->fetch_assoc()) {

				echo "<tr>";
				foreach($row as $val)
				{
					echo "<td>";
					if(!isset($val))
					{
						print_r('');
					}
					else
					{
						print_r($val);
					}
					echo "</td>";
				}
				$id = reset($row);
				echo '<td><a href="RemoveItem.php?id=' . $id . '">Remove Item</a><td>'; 
				echo "</tr>";
            }

        } else	
		{		
            echo "There are no items with that Item_No";
        }			
		echo "</table>";
		echo "</div>";
		unset($_SESSION['CAT']);
		unset($_SESSION['Item']);	
		

	}
	
	static function Category($CAT)
	{
		$conn = ConnectionMaker::getConnection();

        $sql = "SELECT * FROM ITEM
		WHERE Category = " . $CAT . ";";

        $result = $conn->query($sql);
		
        if ($result->num_rows > 0) {
			echo "<div style='overflow-x:auto'>";
			echo "<table id='viewall'>";	
			echo "<tr>";
				echo "<th>Item_No</th>";
				echo "<th>Category</th>";
				echo "<th>Sub Category</th>";
				echo "<th>Availability</th>";
				echo "<th>New</th>";
				echo "<th>Colors</th>";
				echo "<th>Title_English</th>";
				echo "<th>Description_English</th>";
				echo "<th>Title French</th>";
				echo "<th>Description French</th>";
				echo "<th>Country Of Origin</th>";
				echo "<th>Spare Parts</th>";
				echo "<th>Large Image</th>";
				echo "<th>Large Image Text</th>";
				echo "<th>Small Image</th>";
				echo "<th>Small Image Text</th>";
				echo "<th>Instructions</th>";
				echo "<th>Price</th>";
				echo "<th>Remove Item</th><th>Edit Item</th>";
			echo "</tr>";		
            while ($row = $result->fetch_assoc()) {

				echo "<tr>";
				foreach($row as $val)
				{
					echo "<td>";
					if(!isset($val))
					{
						print_r('');
					}
					else
					{
						print_r($val);
					}
					echo "</td>";
				}
				$id = reset($row);
				echo '<td><a href="RemoveItem.php?id=' . $id . '">Remove Item</a><td>'; 
				echo "</tr>";
            }
			echo "</table>";
			echo "</div>";
        } else 
		{
            echo "There are no items in that category";
        }
		unset($_SESSION['CAT']);
		unset($_SESSION['Item']);
	}


}

    


