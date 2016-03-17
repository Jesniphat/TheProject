<?php
	session_start();
	
	
	$myadmin_id = $_REQUEST['admin_id'];
	
	
	include_once("function/admin_data_access.php");
	
	$admin = get_admin_by_id($myadmin_id);
	$_SESSION["edit_admin"]=$admin;
	
	$_REQUEST["page"] = "admin/edit_admin_form_page";
	include("page_controller.php");



?>