<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">

    <title>Homework</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Modal for Signup -->
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

<!-- Modal for Login -->
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

<div class="site-wrapper">

    <div class="site-wrapper-inner">

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

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

</body>
</html>
