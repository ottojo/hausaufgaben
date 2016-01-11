<?php

require("sqlconnection.php");
function hasHomeworkData()
{
    if (!empty($_POST) && $_POST["hDeadline"] != "" && $_POST["hSubject"] != "")
        return true;
    else
        return false;
}

function back()
{
    $newURL = $_GET["continue"];
    header('Location: ' . $newURL);
    die();
}


if (isset($_COOKIE["uId"]) && isset($_COOKIE["uSessionKey"])) {

    $uId = $_COOKIE["uId"];

    $userData = $conn->query("SELECT uSessionKey, uFirstName, uLastName, uEmail FROM users WHERE uId = $uId");
    $userData = $userData->fetch_array();
    $uSessionKey = $userData["uSessionKey"];
    $uFirstName = $userData["uFirstName"];

    if (password_verify($_COOKIE["uSessionKey"], $uSessionKey)) {
        //echo "Your new task, " . $uFirstName;
    } else {
        back();
    }
} else {
    back();
}


if (hasHomeworkData()) {

    $hDeadline = $_POST["hDeadline"];   //26 January, 2016

    $deadlineInt = strtotime($hDeadline);
    $hDeadline = date("Y-m-d", $deadlineInt);

    $hSubject = $_POST["hSubject"];
    $hNotes = $_POST["hNotes"];
    $bId = $_POST["book"];
    if ($bId == -1) {
        $bId = "null";
        $hPageNr = "null";
        $hExerciseNr = "null";
    } else {
        $hPageNr = $_POST["hPageNr"];
        $hExerciseNr = $_POST["hExerciseNr"];
    }


    $newHomework = "INSERT INTO homework (uId, bId, hPageNr, hExerciseNr, hDeadline, hSubject, hNotes) VALUES ($uId, $bId, $hPageNr, $hExerciseNr, \"$hDeadline\", \"$hSubject\",\"$hNotes\")";


    if ($conn->query($newHomework) === TRUE) {
        echo "New homework successfully created";
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //echo "worked";
}

back();


?>
