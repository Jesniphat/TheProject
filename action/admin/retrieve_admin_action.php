<?php
	include_once("function/admin_data_access.php");
	include_once("function/date_data_access.php");
	
	$admins = read_all_admin();
	
	$_REQUEST["page"] = "admin/admin_list_page";
	include("page_controller.php");
?>