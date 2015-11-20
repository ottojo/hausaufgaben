<h1>Neue Seite für Gedöns.</h1>

<?php

function backToIndex()
{

}


require("sqlconnection.php");



if (isset($_COOKIE["uId"]) && isset($_COOKIE["uSessionKey"])) {

    $uId = $_COOKIE["uId"];

    $gotSessionKey = $conn->query("SELECT uSessionKey FROM users WHERE uId = $uId");
    $gotSessionKey = $gotSessionKey->fetch_array();
    $gotSessionKey = $gotSessionKey["uSessionKey"];

    if(password_verify($_COOKIE["uSessionKey"], $gotSessionKey))
    {
        echo ("Welcome, User Nr. $uId");
    }
    else
    {
        //header("Location: ./index.php");
        echo("2");
    }

} else {

    header("Location: ./index.php");


}

?>