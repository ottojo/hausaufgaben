<h1>Hausaufgaben</h1>
<h2>Homework Detail</h2>
<?php


require("sqlconnection.php");


if (isset($_COOKIE["uId"]) && isset($_COOKIE["uSessionKey"])) {

    $uId = $_COOKIE["uId"];

    $userData = $conn->query("SELECT uSessionKey, uFirstName, uLastName, uEmail FROM users WHERE uId = $uId");
    $userData = $userData->fetch_array();
    $uSessionKey = $userData["uSessionKey"];
    $uFirstName = $userData["uFirstName"];
    $uLastName = $userData["uLastName"];
    $uEmail = $userData["uEmail"];

    if (password_verify($_COOKIE["uSessionKey"], $uSessionKey)) {
        echo("Vorname: $uFirstName");
        ?>
        <form action="editUser.php" style="display:inline">
            <input type="text" name="firstname">
            <input type="submit" value="Update">
        </form>
        <?php
        echo("Nachname: $uLastName");
        ?>
        <form action="editUser.php" style="display:inline">
            <input type="text" name="lastname">
            <input type="submit" value="Update">
        </form>
        <?php
        echo("E-Mail: $uEmail");
        ?>
        <form action="editUser.php" style="display:inline">
            <input type="text" name="emai�">
            <input type="submit" value="Update">
        </form>
        <?php
        echo("Passwort");
        ?>
        <form action="editUser.php" style="display:inline">
            <input type="text" name="password">
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        header("Location: ./index.php");
    }
} else {
    header("Location: ./index.php");
}

?>