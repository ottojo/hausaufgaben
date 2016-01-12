 <?php
require("sqlconnection.php");
                if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                }

                        $surename = $_POST["surename"];
                        $firstname = $_POST["firstname"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $passwordsafe = $_POST["passwordsafe"];

                        if ($password != $passwordsafe){
                            die();
                        }
                        else{
                            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                        }

                        $uId = $_COOKIE["uId"];

                        $conn->query("UPDATE  users SET uFirstName='".$firstname."' , uLastName='".$surename."', uEmail='".$email."', uHashedPassword='".$hashedPassword."' WHERE uId=$uId");

                        echo("thisshouldaworkedbuddy");


header("Location: ./index.php");
die();

?>