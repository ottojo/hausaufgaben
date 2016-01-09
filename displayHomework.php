<style type="text/css">
    .inline.material-icons {
        display: inline;
    }
</style>

<head>

    <style type="text/css">
        .inline.material-icons {
            display: inline;
        }
    </style>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"
          media="screen,projection"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Homework</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>


    <script>
        $(document).ready(function () {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal({
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    in_duration: 200, // Transition in duration
                    out_duration: 200, // Transition out duration

                }
            );
        });
    </script>


</head>


<!-- Dropdown Structure -->
<nav>
    <div class="nav-wrapper">
        <i class="inline material-icons">book</i>
        <a href="index.php" class="brand-logo">&nbsp;Hausaufgaben</a>
        <ul class="valign-wrapper right hide-on-med-and-down">

            <li class="active"><a href="displayHomework.php">Homework</a></li>
            <li><a href="enterHomework.php">New Homework</a></li>
            <li><a href="editUser.php">Profile</a></li>

            <?php
            if ((!isset($_COOKIE["uSessionKey"])) || $_COOKIE["uSessionKey"] == "-") {
                ?>
                <li><a class="valign waves-effect waves-light btn modal-trigger" href="#login">Login</a></li>
                <li><a class="valign waves-effect waves-light btn modal-trigger" href="#signup">Sign up</a></li><?php
            } else {
                ?>
                <li><a class="valign waves-effect waves-light btn modal-trigger" href="logout.php?continue=index.php">Logout</a>
                </li>
                <?php
            }
            ?>


        </ul>
    </div>
</nav>

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
        $homework = $conn->query("SELECT hId, bId, hPageNr, hExerciseNr, hDeadline, hSubject, hNotes, hDone FROM homework WHERE uId = $uId && DATEDIFF(hDeadline,CURDATE()) > -3 && hDone = 0");
        $collumn = 1;
        ?>
        <row>
            <?php
            while ($result = $homework->fetch_array()) {

                if ($collumn == 1) {
                    echo("</div><div class =\"row\">");
                    $collumn++;
                } else if ($collumn != 1 && $collumn != 4) {
                    $collumn++;
                } else if ($collumn == 4) {
                    $collumn = 1;
                }


                $hSubject = $result["hSubject"];
                $hNotes = $result["hNotes"];
                $hId = $result["hId"];


                echo("<div class=\"col s3\"><div class=\"card blue-grey darken-1 hoverable\"><div class=\"card-content white-text\">");

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


                if ($hNotes != "")
                    echo("<p><b>My Notes:</b><br>$hNotes</p>");

                echo("</div>");//card-content

                ?>
                <div class="card-action">
                    <a href="markAsDone.php?hId=<?php echo($hId); ?>&continue=<?php echo($_SERVER['REQUEST_URI']); ?>">DONE</a>
                </div>


                <?php echo("</div>");
                echo("</div>");

            } ?>
        </row>
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
