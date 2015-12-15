<?php
/**
 * Created by PhpStorm.
 * User: Jonas Otto
 * Date: 15.12.2015
 * Time: 14:44
 */

$bookId = $_POST["bookId"];
$pageNr = $_POST["pageNr"];
$exerciseNr = $_POST["exerciseNr"];

require("sqlconnection.php");

$conn->query("SELECT uId FROM homework WHERE bId = $bookId && hPageNr = $pageNr && hExerciseNr = $exerciseNr");