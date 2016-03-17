<?php

	$catId = $_REQUEST["catId"];
	include_once("function/product_data_access.php");
	include_once("function/category_data_access.php");
	include_once("function/date_data_access.php");
	include_once("lib/pagination.php");
	
	$totalProductRow = count_product_bycatid($catId);
	
	//เริ่ม ตรวจสอบว่าเป็นการค้นหาจากชื่อ
	$searchWord = $_REQUEST["searchWord"];
	
	$where = "";
	if(isset($searchWord))
	{
		$where = "and productName like '%$searchWord%'";
		$products = read_all_product_by_catid($catId,$where);
	}
	else {
		$products = read_limit_product_bycatId($catId);
	}
	
	$_REQUEST["page"] = "product/product_list_bycatid_page";
	include("page_controller.php");
?>