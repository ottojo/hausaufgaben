<html>
<head>
</head>

<body>

<?php 

require("sqlconnection.php");

$email= $_POST["email"];
$userPassword= $_POST["password"];


if($email != "")
{
	
	
	$sql = "SELECT uId, uHashedPassword  FROM users WHERE uEmail='$email'";
		
	echo("Query: $sql");
	echo("<br>");

	$result = $conn->query($sql);
	
	echo ("Password: $userPassword");
	echo ("<br>");
	
	
	
	
	if ($result->num_rows > 0) 
	{
		$result = $result->fetch_array();
		echo("<br>$result");
		$hashedPassword = $result["uHashedPassword"];
		echo("Got Password hash from Database: $hashedPassword");
		echo("<br>");
		
		echo("PASSWORDS IDENTICAL: " . password_verify($userPassword, $hashedPassword));
		
		echo("<br>");
		echo("<br>");
		echo("<br>");
		
		if(password_verify($userPassword, $hashedPassword))
		{
			echo("Login successfull");
			
			$uId = $result["uId"];
			echo("<br>$result");
			echo("<br>UID: $uId");
			
			setcookie("uId", $uId, time() + (86400 * 1), "/"); #saving ID of current user
			$uSessionKey = substr(md5(rand()), 0, 16); #creating a session key
			setcookie("uSessionKey", $uSessionKey, time() + (86400 * 1), "/");  #saving the session key locally
			$hashedSessionKey = password_hash($uSessionKey, PASSWORD_BCRYPT);
			$sql = "UPDATE users SET uSessionKey = '$hashedSessionKey' WHERE uId = $uId";
			echo("<br>$sql");
			if ($conn->query($sql) === TRUE) 
			{
				echo("<br>");
				echo("Updates Session Key in DB");
			}
			
		}
		else
		{
			echo("Wrong Password");
		}
	} 
	else 
	{
		echo "Kein Benutzer mit dieser Email Adresse.";
	}
	$conn->close();
}
else
{
	echo("Please enter an Email Address");
}
?>

</body>
</html>