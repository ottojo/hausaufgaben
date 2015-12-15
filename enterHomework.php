<?php

require("sqlconnection.php");
function hasHomeworkData()
{
    if (!empty($_POST) && $_POST["hPageNr"] != "" && $_POST["hExerciseNr"] != "" && $_POST["hDeadline"] != "" && $_POST["hSubject"] != "")
        return true;
    else
        return false;
}

?>

    <form action="./enterHomework.php" method="post">


        <input type="number" name="hPageNr"> <?php if (!empty($_POST) && $_POST["hPageNr"] == "") {
            echo("Bitte gib eine Seite an.");
        } ?>
        <br>
        <input type="number" name="hExerciseNr"> <?php if (!empty($_POST) && $_POST["hExerciseNr"] == "") {
            echo("Bitte gib eine Aufgabe an.");
        } ?>

        <br>
        <input type="datetime" name="hDeadline"> <?php if (!empty($_POST) && $_POST["hDeadline"] == "") {
            echo("Bitte gib an, bis wann du die Hausaufgabe abgeben musst.");
        } ?>
        <br>
        <input type="text" name="hSubject"> <?php if (!empty($_POST) && $_POST["hSubject"] == "") {
            echo("Bitte gib  ein Thema an.");
        } ?>
        <br>
        <input type="text" name="hNotes">
        <br>
        <input type="submit" value="Eintragen">

    </form>


<?php

if (isset($_COOKIE["uId"]) && isset($_COOKIE["uSessionKey"])) {

    $uId = $_COOKIE["uId"];

    $userData = $conn->query("SELECT uSessionKey, uFirstName, uLastName, uEmail FROM users WHERE uId = $uId");
    $userData = $userData->fetch_array();
    $uSessionKey = $userData["uSessionKey"];
    $uFirstName = $userData["uFirstName"];

    if (password_verify($_COOKIE["uSessionKey"], $uSessionKey)) {
        echo "Your new task, " . $uFirstName;
    } else {
        header("Location: ./index.php");
    }
} else {
    header("Location: ./index.php");
}


if (hasHomeworkData()) {
    $hPageNr = $_POST["hPageNr"];
    $hExerciseNr = $_POST["hExerciseNr"];
    $hDeadline = $_POST["hDeadline"];
    $hSubject = $_POST["hSubject"];
    $hNotes = $_POST["hNotes"];


    $newHomework = "INSERT INTO homework (hPageNr, hExerciseNr, hDeadline, hSubject, hNotes) VALUES ('" . $hPageNr . "','" . $hExerciseNr . "','" . $hDeadline . "','" . $hSubject . "','" . $hNotes . "')";


    if ($conn->query($newHomework) === TRUE) {
        echo "New homework successfully created";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo "worked";
}


?>