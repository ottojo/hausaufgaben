<?php


function hasLoginData()
{
    if (!empty($_POST) && $_POST["firstname"] != "" && $_POST["lastname"] != "" && $_POST["email"] != "" && $_POST["password"] != "")
        return true;
    else
        return false;
}

require("sqlconnection.php");

echo("<br>");
echo("<br>");

echo(hasLoginData());

echo("<br>");
echo("<br>");

if (hasLoginData()) {
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

    $sql = "INSERT INTO users (uFirstName, uLastName, uEmail, uHashedPassword) VALUES ('" . $firstname . "','" . $lastname . "','" . $email . "','" . $hashedPassword . "')";

    echo($sql);
    echo("<br>");

    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


}
?>
