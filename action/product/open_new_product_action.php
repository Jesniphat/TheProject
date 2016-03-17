<?php

	include_once("function/category_data_access.php");
	$category = read_all_category();
	
	
	$_REQUEST["page"]="product/new_product_form_page";
	include("page_controller.php");
	
?>