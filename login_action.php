<?php

	session_start();

	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];
	
	include_once("function/admin_data_access.php");
	$admin = reed_admin_by_user_name($username);
	
	if($admin ==FALSE)
	{
		$error_massage = "username ผิดกรุณากรอกใหม่";
		include("login_page.php");
	}
	else
	{
		if($password != $admin ["password"])
		{
			$error_massage = "password ผิดกรุณากรอกใหม่";
			include("login_page.php");
		}
		else
		{
			$_SESSION["login"]= $admin ;
			include("admin.php");
		}
	}
?>