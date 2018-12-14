<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:27 AM
 */
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

	/* Summary of Login function
	-Used for when user wants to log in 
	-Checks if user exist, if user does then the login is performed
	-If user does not exist, puts and error for password or email
	*/
	function Login($Username, $Password)
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
}



    


