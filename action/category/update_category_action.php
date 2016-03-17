<?php
	$catID = $_REQUEST["categoryId"];
	$categoryName = $_REQUEST["categoryName"];
	$categoryDescription = $_REQUEST["categoryDescription"];
	$categoryCreateOn = $_REQUEST["createOn"];
	$categoryCreateter = $_REQUEST["createter"];
	
	include_once("function/category_data_access.php");
	update_category($catID,$categoryName,$categoryDescription,$categoryCreateOn,$categoryCreateter);
	
	$_REQUEST["action"]="category/retrieve_category_action";
	include("action_controller.php");
	
?>