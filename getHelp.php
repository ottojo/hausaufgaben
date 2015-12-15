<?php
/**
 * Created by PhpStorm.
 * User: Jonas Otto
 * Date: 15.12.2015
 * Time: 14:44
 */

$bookId = $_POST["bookId"];
$site = $_POST["site"];
$exerciseNr = $_POST["exerciseNr"];

require("sqlconnection.php");

$conn->query("SELECT from ");