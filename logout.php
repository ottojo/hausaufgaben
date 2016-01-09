<?php
setcookie("uSessionKey", "-", time() - 3600);
echo("logged out");
@$newURL = $_GET["continue"];
header('Location: ' . $newURL);
die();