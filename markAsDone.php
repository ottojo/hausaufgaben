<?php
/**
 * Created by PhpStorm.
 * User: Jonas Otto
 * Date: 08.01.2016
 * Time: 16:53
 */
if (isset($_GET["hId"]) && isset($_GET["continue"])) {
    require("sqlconnection.php");
    $hId = $_GET["hId"];
    $conn->query("UPDATE homework SET hDone = 1 WHERE hId = $hId");
    $newURL = $_GET["continue"];
    header('Location: ' . $newURL);
    die();
}