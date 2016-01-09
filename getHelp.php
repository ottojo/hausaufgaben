<?php
/**
 * Created by PhpStorm.
 * User: Jonas Otto
 * Date: 15.12.2015
 * Time: 14:44
 */

$bId = $_GET["bId"];
$pageNr = $_GET["pageNr"];
$exerciseNr = $_GET["exerciseNr"];

require("sqlconnection.php");

$result = $conn->query("SELECT DISTINCT homework.uId, users.uFirstName, users.uLastName, users.uEmail FROM homework, users WHERE bId = $bId && hPageNr = $pageNr && hExerciseNr = $exerciseNr && homework.uId = users.uId && homework.hDone = 1");


if ($result->num_rows == 0) {
    echo("{}");
} else {
    while ($row = $result->fetch_assoc()) {
        $uId = $row["uId"];
        $post_data["uFirstName"] = $row["uFirstName"];
        $post_data["uLastName"] = $row["uLastName"];
        $post_data["uEmail"] = $row["uEmail"];
        $object[$uId] = $post_data;
    }
    echo json_encode($object);
}
die();


