<?php
	include_once("function/product_data_access.php");
	$product = read_10_products();
	$hotproduct = read_hot_products();
	
	
	include("homepage.php");
?>