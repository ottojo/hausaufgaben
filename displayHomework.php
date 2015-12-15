<?php

require("sqlconnection.php");

if (isset($_COOKIE["uId"]) && isset($_COOKIE["uSessionKey"])) {

    $uId = $_COOKIE["uId"];

    $userData = $conn->query("SELECT uSessionKey, uFirstName, uLastName, uEmail FROM users WHERE uId = $uId");
    $userData = $userData->fetch_array();
    $uSessionKey = $userData["uSessionKey"];
    $uFirstName = $userData["uFirstName"];

    if (password_verify($_COOKIE["uSessionKey"], $uSessionKey)) {

        #LOGGED IN
        #$homeworkCount = $conn->query("SELECT COUNT(`hId`) FROM `homework` WHERE `uId` = $uId");
        #$homeworkCount = $homeworkCount->fetch_array();
        #$homeworkCount = $homeworkCount["COUNT(`hId`)"];
        echo("Welcome, $uFirstName.<br>");
        #echo("You have $homeworkCount Tasks created.");
        $homework = $conn->query("SELECT hId, bId, hPageNr, hExerciseNr, hDeadline, hSubject, hNotes, hDone FROM homework WHERE uId = $uId && DATEDIFF(hDeadline,CURDATE()) > -3 "); //has to be fixed
        ?>
        <table border="1">
            <tr>
                <td>hId</td>
                <td>bId</td>
                <td>hPageNr</td>
                <td>hExerciseNr</td>
                <td>hDeadline</td>
                <td>hSubject</td>
                <td>hNotes</td>
                <td>hDone</td>
            </tr>
            <?php
            while ($result = $homework->fetch_array()) {
                echo("<tr>");
                for ($i = 0; $i < 8; $i++) {
                    echo("<td>");
                    echo($result[$i]);
                    echo("</td>");
                }
                echo("</tr>");
            }

            ?>
        </table>

        <?php


    } else {
        header("Location: ./index.php");
    }
} else {
    header("Location: ./index.php");
}


?>
