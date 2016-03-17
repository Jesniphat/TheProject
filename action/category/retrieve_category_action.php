<?php
	include_once("function/category_data_access.php");
	include_once("function/date_data_access.php");
	
	$categorys = read_all_category();
	
	$_REQUEST["page"] = "category/category_list_page";
	include("page_controller.php");
?>