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
            $('select').material_select();


            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year
                container: 'body',
            });
        });
        function exerciseSelection() {
            var book = document.getElementById("bookSelect").value;
            if (book == -1) {
                document.getElementById("pageSelect").setAttribute("disabled", "disabled");
                document.getElementById("exerciseSelect").setAttribute("disabled", "disabled");
            }
            else {
                document.getElementById("pageSelect").removeAttribute("disabled");
                document.getElementById("exerciseSelect").removeAttribute("disabled");
            }
        }


    </script>


</head>


<!-- Dropdown Structure -->
<nav>
    <div class="nav-wrapper">
        <i class="inline material-icons">book</i>
        <a href="index.php" class="brand-logo">&nbsp;Hausaufgaben</a>
        <ul class="valign-wrapper right hide-on-med-and-down">

            <li class="active"><a href="displayHomework.php">Homework</a></li>
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


<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#add">
        <i class="large material-icons">add</i>
    </a>
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

        $homework = $conn->query("SELECT hId, bId, hPageNr, hExerciseNr, hDeadline, hSubject, hNotes, hDone FROM homework WHERE uId = $uId && DATEDIFF(hDeadline,CURDATE()) > -3 && hDone = 0 ORDER BY hDeadline");
        $collumn = 1;
        ?>
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
            $deadline = strtotime($result["hDeadline"]);
            $deadlineString = date('d.m.Y', $deadline);


            echo("<div class=\"col s3\"><div class=\"card blue-grey darken-1 hoverable\"><div class=\"card-content white-text\">");

            echo("<span class=\"col s5 card-title\" style=\"padding: 0;\">$hSubject</span>");
            echo("<span class=\"col s7 card-title right-align\">$deadlineString</span>");
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
                <?php
                if ($result["bId"] != "")
                    echo("<a class= \"modal-trigger\" href=\"#help_hId_$hId\">GET HELP</a>");
                ?>

            </div>


            <?php echo("</div>");
            echo("</div>");

        }
        echo("</div><!--after while--> ");
        $hIds = $conn->query("SELECT hId, bId, hPageNr, hExerciseNr FROM homework WHERE uId = $uId && DATEDIFF(hDeadline,CURDATE()) > -3 && hDone = 0 && bId IS NOT NULL ORDER BY hDeadline");
        while ($homeworkResult = $hIds->fetch_array()) {
            //echo("starting helpers get");
            $bookId = $homeworkResult["bId"];
            $pageNr = $homeworkResult["hPageNr"];
            $exerciseNr = $homeworkResult["hExerciseNr"];
            $helpersResult = $conn->query("SELECT DISTINCT homework.uId, users.uFirstName, users.uLastName, users.uEmail FROM homework, users WHERE bId = $bookId && hPageNr = $pageNr && hExerciseNr = $exerciseNr && homework.uId = users.uId && homework.hDone = 1 && users.uId != $uId");

            ?>
            <!-- HELP -->
            <div class="modal" id="help_hId_<?php echo($homeworkResult["hId"]); ?>">
                <div class="modal-content">
                    <h4>Get Help</h4>
                    <div class="container">
                        <?php
                        if ($helpersResult->num_rows > 0) {
                        echo("<div class=\"collection\" style=\"margin-bottom: auto;\">");
                        while ($helper = $helpersResult->fetch_array()) {
                            $email = $helper["uEmail"];
                            $name = $helper["uFirstName"] . " " . $helper["uLastName"];
                            echo("<a href=\"mailto:$email\" class=\"collection-item\">$name <i class=\"material-icons right right-align\">send</i></a>");
                        }
                        ?>
                    </div>
                </div>
                <?php


                } else {
                    echo("<h5 class=\"center-align\">Nobody has completed this exercise yet.</h5>");
                }
                ?>

            </div>
            <div class="modal-footer">
                <button class="modal-action modal-close btn waves-effect waves-light">Close
                </button>
            </div>
            </div>
            </div>
            <?php
        }


    } else {
        header("Location: ./index.php");
    }
} else {
    header("Location: ./index.php");
}


?>


<!-- Modal for Add -->

<div class="modal" id="add">
    <div class="modal-content">
        <h4>Add Homework</h4>
        <form action="enterHomework.php?continue=displayHomework.php" method="post">
            <div class="row">
                <div class="input-field col s8">
                    <select id="bookSelect" name="book" onchange="exerciseSelection()">
                        <option value="-1" selected>No book</option>
                        <?php
                        $resultBook = $conn->query("SELECT bId, bTitle FROM books");
                        while ($book = $resultBook->fetch_array()) {
                            $bId = $book["bId"];
                            $bTitle = $book["bTitle"];
                            echo("<option value=\"$bId\" >$bTitle</option>");
                        }
                        ?>
                    </select>
                    <label>Book</label>
                </div>
                <div class="input-field col s2">
                    <input name="hPageNr" id="pageSelect" type="number" value="1" min="1" disabled="disabled">
                    <label>Page</label>
                </div>
                <div class="input-field col s2">
                    <input name="hExerciseNr" id="exerciseSelect" type="number" value="1" min="1"
                           disabled="disabled">
                    <label>Exercise Nr</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                    <input required name="hSubject" type="text">
                    <label>Subject</label>
                </div>
                <div class="input-field col s4">
                    <input required type="text" name="hDeadline" class="datepicker">
                    <label>Deadline</label>
                </div>
            </div>

            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="notes" name="hNotes" class="materialize-textarea"></textarea>
                        <label for="notes">Notes</label>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit">Create
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
</div>


