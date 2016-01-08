<style type="text/css">
    .inline.material-icons {
        display: inline;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
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
            $('.modal-trigger').leanModal();
        });
    </script>


</head>


<body>

<!-- Dropdown Structure -->
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <i class="inline material-icons">book</i>
            <a href="index.php" class="brand-logo">&nbsp;Hausaufgaben</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <a class="waves-effect waves-light btn modal-trigger" href="#login">Login</a>
                <a class="waves-effect waves-light btn modal-trigger" href="#signup">Sign up</a>
                <li><a href="displayHomework.php">Homework</a></li>
                <li><a href="enterHomework.php">New Homework</a></li>
                <li><a href="editUser.php">Profile</a></li>
            </ul>
        </div>
    </nav>
</div>


<!-- Modal for Signup -->
<div class="modal" id="signup">
    <div class="modal-content">
        <h4>Sign up</h4>
        <form action="./register.php" method="post">
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
                <button type="submit" class="modal-action waves-effect waves-green btn-flat">Sign up</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal for Login -->

<div class="modal" id="login">
    <div class="modal-content">
        <h4>Log in</h4>
        <form action="login.php" method="post">


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
                <button type="submit" class="modal-action waves-effect waves-green btn-flat">Log in</button>
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
