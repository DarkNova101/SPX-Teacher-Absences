<?php

session_start();
session_destroy();
$_POST['message'] = "Logged out!";
header("Location: ./index.php");
die();

