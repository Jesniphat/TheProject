<?php
	
	include_once("function/category_data_access.php");
	
	$catId = $_REQUEST["catId"];
	
	$ctg = get_category_by_id($catId);
	
	
	$_REQUEST["page"]="category/edit_category_form_page";
	include("page_controller.php");
	
	
	
?>