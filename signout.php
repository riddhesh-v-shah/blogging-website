<?php

require_once "app/init.php";

$auth->signout();
header("Location: signin.php");

?>