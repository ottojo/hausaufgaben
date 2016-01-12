<!DOCTYPE html>
<html lang="en">

<head>

    <style type="text/css">
        .inline.material-icons {
            display: inline;
        }

        .promo i {
            margin: 40px 0;
            color: #ee6e73;
            font-size: 7rem;
            display: block;
        }

        .promo-caption {
            font-size: 1.7rem;
            font-weight: 500;
            margin-top: 5px;
            margin-bottom: 0;
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

<!-- Dropdown Structure -->

<nav>
    <div class="nav-wrapper">
        <i class="inline material-icons">book</i>
        <a href="index.php" class="brand-logo">&nbsp;Hausaufgaben</a>
        <ul class=" right">

            <li><a href="displayHomework.php">Homework</a></li>
            <li><a href="editUser.php"><i class="inline waves-effect waves-light  material-icons">perm_identity</i></a></li>

            <?php
            if ((!isset($_COOKIE["uSessionKey"])) || $_COOKIE["uSessionKey"] == "-") {
                ?>
                <li><a class="inline  waves-effect waves-light btn modal-trigger" href="#login">Login</a></li>
                <li><a class="inline  waves-effect waves-light btn modal-trigger" href="#signup">Sign up</a>
                </li><?php
            } else {
                ?>
                <li><a class="inline  waves-effect waves-light btn modal-trigger"
                       href="logout.php?continue=index.php">Logout</a></li>
                <?php
            }
            ?>


        </ul>
    </div>
</nav>


<div class="container">
    <div class="row">
        <h3 class="col s12 light center header" style="color: #ee6e73;">Track all your Homework</h3>
    </div>

    <div class="row">
        <div class="col s12 m4">
            <div class="center promo">
                <i class="material-icons">group</i>
                <p class="promo-caption">Get help easily</p>
                <p class="light center">If you specify which book and page an exercise is from, you can see which
                    friends have already completed this task and ask them for help.</p>
            </div>
        </div>

        <div class="col s12 m4">
            <div class="center promo">
                <i class="material-icons">notifications_active</i>
                <p class="promo-caption">Get notified of upcoming tasks</p>
                <p class="light center">You can choose to get an email notification for your tasks. It's possible to
                    specify how much time before the deadline you want to be notified and you can set a default time to
                    send the notifications.</p>
            </div>
        </div>

        <div class="col s12 m4">
            <div class="center promo">
                <i class="material-icons">backup</i>
                <p class="promo-caption">All data stored in the cloud</p>
                <p class="light center">Your tasks are stored on our servers in the cloud, so you are able to access
                    your data from any device, just your login required. Using a custom session- and loginsystem your
                    data is always safe.</p>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Signup -->
<div class="modal" id="signup">
    <div class="modal-content">
        <h4>Sign up</h4>
        <form action="./register.php?continue=index.php" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="signupFirstname" type="text" name="firstname">
                    <label for="signupFirstname">First Name</label>
                </div>

                <div class="input-field col s6">
                    <input id="signupLastname" type="text" name="lastname">
                    <label for="signupLastname">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="email">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" name="password">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="action">Sign up
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal for Login -->

<div class="modal" id="login">
    <div class="modal-content">
        <h4>Log in</h4>
        <form action="login.php?continue=index.php" method="post">


            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="email">
                    <label for="email">Email</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" name="password">
                    <label for="password">Password</label>
                </div>
            </div>


            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="action">Log in
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
</div>


<!--
	<div class="card-panel hoverable">
		 <div class="row">
      <div class="col s7 push-s5"><span class="flow-text">This div is 7-columns wide on pushed to the right by 5-columns.</span></div>
      <div class="col s5 pull-s7"><span class="flow-text">5-columns wide pulled to the left by 7-columns.</span></div>
    </div>	
	</div>
	

  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
  </ul>-->


</body>
</html>
