<h1>Neue Seite für Gedöns.</h1>

<?php



require("sqlconnection.php");


if (isset($_COOKIE["uId"]) && isset($_COOKIE["uSessionKey"])) {

    $uId = $_COOKIE["uId"];

    $userData = $conn->query("SELECT uSessionKey, uFirstName, uLastName, uEmail FROM users WHERE uId = $uId");
    $userData = $userData->fetch_array();
    $uSessionKey = $userData["uSessionKey"];
    $uFirstName = $userData["uFirstName"];

    if (password_verify($_COOKIE["uSessionKey"], $uSessionKey)) {
        echo("Welcome, $uFirstName.");
    } else {
        header("Location: ./index.php");
    }
} else {
    header("Location: ./index.php");
}

?>