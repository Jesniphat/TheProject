<?php
	
	$productId = $_REQUEST["proId"];
	
	
	include_once("function/product_data_access.php");
	$product = get_product_by_id($productId);
	
	include_once("function/category_data_access.php");
	$category = read_all_category();
	
	
	$_REQUEST["page"] = "product/edit_product_form_page1";
	include("page_controller.php");
	
	
	
?>