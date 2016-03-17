<?php
    $productId = $_REQUEST["proId"];
	
	include_once("function/product_data_access.php");
	delete_product($productId);
	
	$_REQUEST["action"]="product/retrieve_product_action";
	include("action_controller.php");
?>