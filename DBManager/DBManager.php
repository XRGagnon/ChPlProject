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

    //Secure login
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



	/* Summary of Login function
	-Used for when user wants to log in 
	-Checks if user exist, if user does then the login is performed
	-If user does not exist, puts and error for password or email
	*/
	/* This is the old, unsecure login function
	 * function Login($Username, $Password)
	{
        $conn = ConnectionMaker::getConnection();

		$sql = "SELECT Username, User_Password FROM USER
		WHERE Username = "+$Username+"
		And User_Password = "+$Password+";";

		//perfrom the query and store the results	
		$result = $conn->query($sql);
		
		//check to see if there are any records returned
		if($result->num_rows = 1)
		{

			return true;

		}
		else{
			return false;
		}
	}*/

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
}



    


