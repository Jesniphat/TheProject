<?php
	session_start();
	
	if(isset($_SESSION["login"]))
	{
	    $productId = $_REQUEST["proId"];
		$categoryId = $_REQUEST["categoryId"];
		
		include_once("function/product_data_access.php");
		delete_product($productId);
		
		$_REQUEST["catId"]=$categoryId;
		include("action/product/retieve_product_bycatid_action.php");
		
	}
	
	else
	{
		include("login_page.php");
	}
?>