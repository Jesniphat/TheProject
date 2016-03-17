<?php
	session_start();
	
	unset($_SESSION["login"]);
	
	include("login_page.php");
?>