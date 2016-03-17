<?php
	include_once("function/product_data_access.php");
	include_once("function/category_data_access.php");
	include_once("function/date_data_access.php");
	include_once("lib/pagination.php");
	
	$categorys = read_all_category();
	$totalProductRow = count_product();
	
	//เริ่ม ตรวจสอบว่าเป็นการค้นหาจากชื่อ
	$searchWord = $_REQUEST["searchWord"];
	$where = "";
	if(isset($searchWord))
	{
		$where = "where productName like '%$searchWord%'";
		$products = read_all_product($where);
	}
	else {
		$products = read_all_product_page();
	}
	/*เริ่มดึงข้อมูลเลขหน้าแต่ล่ะหน้า*/
		// $pageNumber = $_REQUEST["pageNumber"];
		// $products = "";
		// if(!isset($pageNumber))
		// {
		// 	$products = read_all_product($where);
		// }
		// else
		// {
		// 	$startIndex = ($pageNumber-1)*5;
		// 	$products = read_limit_product($startIndex);
		// 	//mysql_query("select * from product $where limit $startIndex,$diplayRow");
		// }
	
	$_REQUEST["page"] = "product/product_list_page";
	include("page_controller.php");
?>