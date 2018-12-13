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
	    $conn = connectionMaker::getConnection();
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

	function Login($Username, $Password)
	{
        $conn = connectionMaker::getConnection();
		$sql = "SELECT Username, User_Password FROM USER
		WHERE Username = $Username
		And User_Password = $Password";
		
		$result = $conn->query($sql);
		
		if($result->num_rows = 1)
		{
			
			//perform the log in things over here
		}
		else{
			echo "Username or password were incorrect";
		}
	}

	function Register($Email, $FName, $LName, $Username, $Password, $User_Type, $Date)
	{
        $conn = connectionMaker::getConnection();
		$sql = "INSERT INTO TABLE USER
		VALUES ($Email, $FName, $LName, $Username, $Password, $User_Type, $Date)";
		
		$sqlCheckUsername = "SELECT Username FROM USER
		WHERE Username = '$Username'";  
									
		$sqlCheckEmail = "SELECT Email User_Email FROM USER
		WHERE User_Email = '$Email'"; 
		
		$resultUsername = $conn->query($sqlCheckUsername);
		
		$resultEmail = $conn->query($sqlCheckEmail);
		
		if($resultUsername->num_rows = 0)
		{
			if($resultEmail->num_rows = 0)
			{
				if($conn->query($sql) === TRUE)
				{
					echo "You have Registered Successfully";
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

?>
=======
    
}
>>>>>>> Stashed changes
