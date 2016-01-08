<!-- materiealizeoderso core CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

<!-- Custom styles for this template -->
<!-- <link href="style.css" rel="stylesheet"> -->


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


<!-- Dropdown Structure -->
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo">Hausaufgaben</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="displayHomework.php">Homework</a></li>
                <li><a href="enterHomework.php">New Homework</a></li>
                <li><a href="editUser.php">Profile</a></li>
            </ul>
        </div>
    </nav>
</div>

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
        //echo("Welcome, $uFirstName.<br>");
        #echo("You have $homeworkCount Tasks created.");
        $homework = $conn->query("SELECT hId, bId, hPageNr, hExerciseNr, hDeadline, hSubject, hNotes, hDone FROM homework WHERE uId = $uId && DATEDIFF(hDeadline,CURDATE()) > -3 "); //has to be fixed
        $collumn = 1;
        ?>
        <div>
            <?php
            while ($result = $homework->fetch_array()) {

                if ($collumn == 1) {
                    echo("</div><div class =\"row\">");
                    $collumn++;
                } else if ($collumn == 2) {
                    $collumn++;
                } else if ($collumn == 3) {
                    $collumn = 1;
                }


                $hSubject = $result["hSubject"];
                $hNotes = $result["hNotes"];


                echo("<div class=\"col m4\">
                        <div class=\"card blue-grey darken-1\">
                        <div class=\"card-content white-text\">");

                echo("<span class=\"card-title\">$hSubject</span>");

                if ($result["bId"] != "" && $result["hPageNr"] != "" && $result["hExerciseNr"] != "") {
                    $bId = $result["bId"];
                    $pageNr = $result["hPageNr"];
                    $exerciseNr = $result["hExerciseNr"];
                    $book = $conn->query("SELECT bTitle FROM books WHERE bId = $bId");
                    $bookResult = $book->fetch_array();
                    $bookTitle = $bookResult["bTitle"];
                    echo("<br><b>$bookTitle</b>");#
                    echo("<br>Page Nr. $pageNr");
                    echo("<br>Exercise Nr. $exerciseNr");

                }


                echo("<p><b>My Notes:</b><br>$hNotes</p>");

                echo("</div>");
                echo("</div>");
                echo("</div>");

            } ?>
        </div>
        <?php


    } else {
        header("Location: ./index.php");
    }
} else {
    header("Location: ./index.php");
}


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
