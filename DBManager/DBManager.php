<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:27 AM
 */

include_once "../DBManager/ConnectionMaker.php";
class DBManager
{
	function Detail($DATEVARIABLE)
	{
	    $conn = ConnectionMaker::getConnection();
		
		//write the sql query
		$sql = "SELECT * FROM USER, TRANSACTIONS, CART
		WHERE TRANSACTIONS.Transaction_ID = USER.User_ID
		And TRANSACTIONS.Cart_ID = CART.Cart_Id
		And TRANSACTIONS.Transaction_Date >". $DATEVARIABLE; 
		
		$sql2 = "SELECT * FROM USER";
		
		$sql3 = "SELECT * FROM CHANGES, USER, ITEM
		WHERE CHANGES.Item_ID = ITEM.Item_ID
		AND CHANGES.User_ID = USER.User_ID
		AND CHANGES.Change_Date >". $DATEVARIABLE;

		//get the result form the sql query
		$result = $conn->query($sql);

		//check to see if there are any rows returned from the query
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "$row";
			}
		}
		else
		{
			echo "There were no records returned for the specified date";
		}
	} 

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
		And TRANSACTIONS.Transaction_Date >". $DATEVARIABLE; 

		//get the result form the sql query
		$result = $conn->query($sql);

		//check to see if there are any rows returned from the query
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "$row";
			}
		}
		else
		{
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
    static function Login($user, $password) {
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
                    if ($pEq){
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
		And TRANSACTIONS.Transaction_Date >". $DATEVARIABLE; 
		
		$sql2 = "SELECT * FROM USER";
		
		$sql3 = "SELECT * FROM CHANGES, USER, ITEM
		WHERE CHANGES.Item_ID = ITEM.Item_ID
		And CHANGES.User_ID = USER.User_ID
		And CHANGES.Change_Date >". $DATEVARIABLE;
		
		//get the result from the query
		$result = $conn->query($sql);
		$result2 = $conn->query($sql2);
		$result3 = $conn->query($sql3);
		
		//check to see if anything is returned ---------Result 1
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "$row";
			}
		}
		else
		{
			echo "There were no records returned for the specified date";
		}
		
		//check to see if anything is returned ---------Result 2
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "$row";
			}
		}
		else
		{
			echo "Something went wrong trying to get User Information";
		}
		
		//check to see if anything is returned ---------Result 3
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "$row";
			}
		}
		else
		{
			echo "There were no records returned for the specified date";
		}
	}
	
	function Exception($DATEVARIABLE, $NUMBERVARIABLE)
	{
		$conn = ConnectionMaker::getConnection();
		
		$sql = "SELECT * FROM USER, TRANSACTION, CART
		WHERE  TRANSACTION.Transaction_ID = USER.User_ID
		And TRANSACTION.Cart_ID = CART.Cart_Id
		AND TRANSACTION.Total_cost > ". $NUMBERVARIABLE .";";
		
		$sql2 = "SELECT * FROM USER
		Where Date_Added > ". $DATEVARIABLE. ";";
		
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
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "$row";
			}
		}
		else
		{
			echo "There were no records returned for the specified date";
		}
		
		//check to see if anything is returned ---------Result 2
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "$row";
			}
		}
		else
		{
			echo "There are no records returned for the specified date";
		}
		
		//check to see if anything is returned ---------Result 3
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "$row";
			}
		}
		else
		{
			echo "There were no records returned for the specified date";
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
		
		if($resultUsername->num_rows = 0)
		{
			if($resultEmail->num_rows = 0)
			{
				if($conn->query($sql) === TRUE)
				{
					echo "You have Registered Successfully";
					header('Location: placeholder.url');
				}
				else
				{
					echo "Something went wrong, try again later";
				}
			}
			else{
				echo "That Email already exists";
			}
		}
		else{
			echo "That Username already exists";
		}
	}
	

	function Cart($USERVARIABLE)
	{
		$conn = ConnectionMaker::getConnection();
		
		$sql = "SELECT Item_Name, Item_Qty, Item_Price * Item_Qty AS “Cost” FROM CART_ITEM, CART, ITEM, USER
		WHERE USER.User_ID = CART.User_ID
		And CART.Cart_ID = CART_ITEM.Cart_ID
		And CART_ITEM.Item_ID = ITEM.Item_ID
		And USER.User_ID = ". $USERVARIABLE . ";";
		
		$result = $conn->query($sql);
		
		if($result -> num_rows > 0)
		{
			echo "$row";
		}
		else{
			echo "you do not have anything in your cart";
		}
	}
	
	function Add_Item($Item_NameVariable, $Item_PriceVariable, $Date, $Cat_ID)
	{
		$conn = ConnectionMaker::getConnection();
		
		$sql = "INSERT INTO TABLE ITEM 
		VALUES (".$Item_NameVariable.", ".$Item_PriceVariable.", ".$Date.", ".Cat_ID.");";
		
		if($conn->query($sql) === true)
		{
			echo "Item Added Successfully";
		}
		else{
			echo "Something went wrong, try again later";
		}
	}
	
	function Update_Item($ItemNameVariable, $PriceVariable, $ItemIdVariable)
	{
		$conn = ConnectionMaker::getConnection();
		
		$sql = "Update ITEM
		Set Item_Name = ".$ItemNameVariable.", Item_Price = ".$PriceVariable." 
		Where Item_ID = ".Item_IDVariable.";";
		
		if($conn->query($sql) === true)
		{
			echo "Item has been successfully updated";
		}
		else{
			echo "Something went wrong, please try again another time";
		}
	}
	
	function Remove_Item($ItemIdVariable)
	{
		$conn = ConnectionMaker::getConnection();
		
		$sql = "DELETE FROM ITEM
		SWhere 
		Item_ID = ".$ItemIdVariable.";";
		
		if($conn->query($sql) === true)
		{
			echo "Item has been successfully updated";
		}
		else{
			echo "Something went wrong, please try again another time";
		}
	}
	
	// This Function needs a little review, not sure in what context this is used
	function View_Items()
	{
		$conn = ConnectionMaker::getConnection();
		
		$sql = "SELECT Item_Name, Item_Price 
		FROM ITEMS;";
		
		$result = $conn->query($sql);
		
		if($result -> num_rows > 0)
		{
			echo "$row"
		}
		else{
			echo "Nothing could be displayed at this time, try agin later";
		}
	}

	

}



    


