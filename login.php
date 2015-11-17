<html>
<head>
</head>

<body>

<?php 

$email= $_POST["email"];
$password= $_POST["password"];

$servername = "localhost";
$username = "website";
$password = "";
$dbname = "hausaufgaben";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
	

if($email != "")
{
	
	
	$sql = "SELECT uHashedPassword FROM users WHERE uEmail='$email'";
		
	echo($sql);
	echo("<br>");

	$resultHashedPassword = $conn->query($sql);
	
	
	
	
	
	if ($resultHashedPassword->num_rows > 0) 
	{
		
		if(password_verify($password, $resultHashedPassword->fetch_assoc()["uHashedPassword"]))
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