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

<body>


<nav>
    <div class="nav-wrapper">
        <i class="inline material-icons">book</i>
        <a href="index.php" class="brand-logo">&nbsp;Hausaufgaben</a>
        <ul class="valign-wrapper right hide-on-med-and-down">

            <li><a href="displayHomework.php">Homework</a></li>
            <li class="active"><a href="enterHomework.php">New Homework</a></li>
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

</body>
