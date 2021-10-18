<?php   

session_start();
$_SESSION['id'] = 0;
session_destroy();
header("location:index.php");