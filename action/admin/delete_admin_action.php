<?php
	$admin_id = $_REQUEST["admin_id"];

	include_once("function/admin_data_access.php");
	delete_admin($admin_id);
	
	$_REQUEST["action"]="admin/retrieve_admin_action";
	include("action_controller.php");
?>