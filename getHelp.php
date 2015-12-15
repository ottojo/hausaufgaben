<?php
/**
 * Created by PhpStorm.
 * User: Jonas Otto
 * Date: 15.12.2015
 * Time: 14:44
 */

$bookId = $_GET["bookId"];
$pageNr = $_GET["pageNr"];
$exerciseNr = $_GET["exerciseNr"];

require("sqlconnection.php");

$result = $conn->query("SELECT homework.uId, homework.bId, homework.hPageNr, homework.hExerciseNr, users.uFirstName, users.uEmail FROM homework, users WHERE bId = $bId && hPageNr = $pageNr && hExerciseNr = $exerciseNr && homework.uId = users.uId ");




while($row = $result->fetch_assoc())
{
	$uId = $row["uId"];
	$post_data["bId"] = $row["bId"];
	$post_data["hPageNr"] = $row["hPageNr"];
	$post_data["hExerciseNr"] = $row["hExerciseNr"];
	$object[$uId] = $post_data; 
}
echo json_encode($object);