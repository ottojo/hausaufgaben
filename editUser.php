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
                    out_duration: 200, // Transition out duration});

             $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
        });
    </script>


</head>

<body>

<nav>
        <div class="nav-wrapper">
            <i class="inline material-icons">book</i>
            <a href="index.php" class="brand-logo">&nbsp;Hausaufgaben</a>
            <ul class="valign-wrapper right">

                <li><a href="displayHomework.php">Homework</a></li>
                <li><a href="editUser.php"><i class="inline material-icons">perm_identity</i></a></li>

                <?php
                if ((!isset($_COOKIE["uSessionKey"])) || $_COOKIE["uSessionKey"] == "-") {
                    ?>
                    <li><a class="inline valign waves-effect waves-light btn modal-trigger" href="#login">Login</a></li>
                    <li><a class="inline valign waves-effect waves-light btn modal-trigger" href="#signup">Sign up</a>
                    </li><?php
                } else {
                    ?>
                    <li><a class="inline valign waves-effect waves-light btn modal-trigger"
                           href="logout.php?continue=index.php">Logout</a></li>
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
            #loggedin

                $data = $conn->query("SELECT uFirstName, uLastName, uEmail, uHashedPassword FROM users WHERE uId = $uId");
                $data = $data->fetch_array();

                $uFirstName = $data["uFirstName"];
                $uLastName = $data["uLastName"];
                $uEmail = $data["uEmail"];
                $uHashedPassword = $data["uHashedPassword"];

            ?>

            <div class="container">

                <h4 class="center"><?php echo ("Welcome, " . $uFirstName . ". These are your profile settings.") ?> </h1>

                    <br>

                <form method="post" action="updateUser.php">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="firstname" type="text" name="firstname" value="<?php echo($uFirstName); ?>">
                            <label for="firstname">First Name</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="surename" type="text" name="surename" value="<?php echo($uLastName); ?>">
                            <label for="surename">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" name="email" value="<?php echo($uEmail); ?>" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="password" type="password" name="password">
                            <label for="password">Password</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="passwordsafe" type="password" name="passwordsafe">
                            <label for="passwordsafe">Password</label>
                        </div>
                    </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

                </form>
            </div>

     <?php
        } else {
            header("Location: ./index.php");
        }
    } else {
        header("Location: ./index.php");
    }

    ?>

</body>
