<?php
	$catId = $_REQUEST["catId"];
	
	include_once("function/category_data_access.php");
	$catDl = delete_categyry($catId);
	
	
	$_REQUEST["action"] = "category/retrieve_category_action";
	include("action_controller.php");
?>