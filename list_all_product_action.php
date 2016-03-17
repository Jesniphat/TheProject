<?php
    include_once("function/product_data_access.php");
    include_once("lib/pagination.php");
	//include_once("function/category_data_access.php");
	$totalProductRow = count_product();

	$product = read_all_product_limit_home();
	include("list_all_product_page.php");
?>