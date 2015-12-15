<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">

    <title>Homework</title>
	<sript>
  $(index.php).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });</script>

    <!-- materiealizeoderso core CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">

    <!-- Custom styles for this template -->
   <!-- <link href="style.css" rel="stylesheet"> -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Dropdown Structure -->
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">
      <a href="/index.php" class="brand-logo">Hausaufgaben</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="displayHomework.php">Homework</a></li>
        <li><a href="enterHomework.php">New Homework</a></li>
        <li><a href="editUser.php">Profile</a></li>
      </ul>
    </div>
  </nav>
</div>        
        
<!-- Modal for Signup 
<div class="modal fade" id="signup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sign up</h4>
            </div>
            <form action="./register.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="signupFirstname">First Name</label>
                        <input class="form-control" type="text" name="firstname" id="signupFirstname"
                               placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="signupLastname">Last Name</label>
                        <input class="form-control" type="text" name="lastname" id="signupLastname"
                               placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="signupEmail">Email address</label>
                        <input class="form-control" type="email" name="email" id="signupEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="signupPassword">Password</label>
                        <input class="form-control" type="password" name="password" id="signupPassword"
                               placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Login 
<div class="modal fade" id="login" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Log in</h4>
            </div>
            <form action="login.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="loginEmail">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" placeholder="Password"
                               name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">Homework</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <h1 class="cover-heading">Track your Homework.</h1>

                <p class="lead">Use Homework to track your tasks. Homework notifies you to do your work and helps
                    you to
                    find help.</p>

                <p class="lead">
                    <a href="#" class="btn btn-lg btn-default" data-toggle="modal" data-target="#signup">Sign up</a>
                    <a
                        href="#" class="btn btn-lg btn-default" data-toggle="modal" data-target="#login">Log in</a>
                </p>
            </div>


            <div class="mastfoot">
                <div class="inner">
                    <p>Project from <a href="https://github.com/conwear">Kasimir</a> and <a
                            href="https://github.com/ottojo">Jonas</a></p>
                </div>
            </div>

        </div>

    </div>

</div> -->


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
  </ul>
          

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>

</body>
</html>
