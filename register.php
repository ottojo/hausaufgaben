<?php


	function hasLoginData()
	{
		if(!empty($_POST) && $_POST["firstname"] != "" && $_POST["lastname"] != "" && $_POST["email"] != "" && $_POST["password"] != "")
			return true;
		else
			return false;
	}

?>

<html>
<body>

	<form action="./register.php" method="post">
				
		Vorname:<br>
		<input type="text" name="firstname"> <?php if(!empty($_POST) && $_POST["firstname"] == ""){ echo("Bitte gib einen Namen an."); } ?>
		<br>
		Nachname:<br>
		<input type="text" name="lastname"> <?php if(!empty($_POST) && $_POST["lastname"] == ""){ echo("Bitte gib einen Nachnamen an."); } ?>
		<br>
		E-Mail:<br>
		<input type="text" name="email"> <?php if(!empty($_POST) && $_POST["email"] == ""){ echo("Bitte gib eine E-Mail Addresse an."); } ?>
		<br>
		Passwort:<br>
		<input type="password" name="password"> <?php if(!empty($_POST) && $_POST["password"] == ""){ echo("Bitte gib ein Passwort an."); } ?>
		<br><br>
		<input type="submit" value="Registrieren">
		
		
	</form>
	
	<?php
	
		require("sqlconnection.php");
	
		echo("<br>");
		echo("<br>");
		
		echo(hasLoginData());
		
		echo("<br>");
		echo("<br>");

		if(hasLoginData())
		{
			$firstname = $_POST["firstname"];
			$lastname = $_POST["lastname"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
			$hasLoginData = true;


			echo("<br>firstname: " . $firstname);
			echo("<br>lastname: " . $lastname);
			echo("<br>email: " . $email);
			echo("<br>password: " . $password);
			echo("<br>hashedPassword: " . $hashedPassword);			
			
			

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			echo "Connected successfully";
			
			$sql = "INSERT INTO users (uFirstName, uLastName, uEmail, uHashedPassword) VALUES ('" . $firstname . "','". $lastname . "','". $email . "','". $hashedPassword . "')";
			
			echo($sql);
			echo("<br>");

			if ($conn->query($sql) === TRUE) 
			{
				echo "New user created successfully";
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

$conn->close();
			
			
		}
	?>



</body>
</html>
