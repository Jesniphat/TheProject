<?php
	session_start();
	
	
	
	$categoryName = $_REQUEST["categoryName"];
	$categoryDescription = $_REQUEST["categoryDescription"];
	$createter = $_SESSION["login"]["adminName"];


	include_once("function/category_data_access.php");
	$category_id = create_category($categoryName,$categoryDescription,$createter);

	$_REQUEST["action"]="category/retrieve_category_action";
	include("action_controller.php");

?>