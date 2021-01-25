<?php
	include('database.php');
	session_start();
	session_destroy();
	session_unset($_SESSION['id']);
	session_unset($_SESSION['username']);
	header("Location:login.php");
?>