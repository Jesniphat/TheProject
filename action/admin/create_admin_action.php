<?php
	$adminName = trim($_REQUEST["name"]);
	$adminLastName = trim($_REQUEST["lastname"]);
	$adminUserName = trim($_REQUEST["userName"]);
	$adminPassWord = trim($_REQUEST["passWord"]);
	$adminEmail = trim($_REQUEST["adminEmail"]);
	
	$error_massager = "";
	
	include_once("function/admin_data_access.php");
	$checkUsername = read_admin_by_username($adminUserName);
	
	if($checkUsername != FALSE)
	{
		$error_massager .= "UserName นี้ถูกใช้ไปแล้ว"; 
	}
	
	$checkEmail = read_admin_by_email($adminEmail);
	if($checkEmail != FALSE)
	{
		$error_massager .= "Email นี้ถูกใช้ไปแล้วนะ";
	}
	
	if($error_massager == "")
	{
		create_admin($adminName,$adminLastName,$adminUserName,$adminPassWord,$adminEmail);
		
		$_REQUEST["action"]="admin/retrieve_admin_action";
		include("action_controller.php");
	}
	
	else
	{
		$_REQUEST["page"]="admin/new_admin_form_page";
		include("page_controller.php");
	}
?>