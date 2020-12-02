<?php
session_start();
$_SESSION['id'] = "";
$_SESSION['username'] = "";
if(empty($_SESSION['id'])) header("location: login.php");
?>
