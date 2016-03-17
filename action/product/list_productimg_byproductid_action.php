<?php
    $proId = $_REQUEST["proId"];
	
	include_once("function/category_data_access.php");
	include_once("function/product_data_access.php");
	include_once("function/product_img_data_access.php");
	
	$pro = get_product_by_id($proId);
	$proImg = get_product_img_by_id($proId);
	$catId = $pro["categoryId"];
	
	
	include("page/product/img_list_page.php");
?>