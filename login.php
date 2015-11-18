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
	
	
	$sql = "SELECT uHashedPassword FROM users WHERE uEmail='$email'";
		
	echo("Query: $sql");
	echo("<br>");

	$resultHashedPassword = $conn->query($sql);
	
	echo ("Password: $userPassword");
	echo ("<br>");
	
	
	
	
	if ($resultHashedPassword->num_rows > 0) 
	{
		$hashedPassword = $resultHashedPassword->fetch_assoc()["uHashedPassword"];
		echo(" Got Password hash from Database: $hashedPassword");
		echo("<br>");
		
		echo("PASSWORDS IDENTICAL: " . password_verify($userPassword, $hashedPassword));
		
		echo("<br>");
		echo("<br>");
		echo("<br>");
		
		if(password_verify($userPassword, $hashedPassword))
		{
			echo("Login successfull");
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