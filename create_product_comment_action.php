<?php
    $product_id = $_REQUEST["product_id"];
	$writername = $_REQUEST["writername"];
	$comment = $_REQUEST["comment"];
	
	include_once("function/product_comment_data_access.php");
	$pro_com = create_product_comment($writername,$comment,$product_id);
	header("Location:view_product_action.php?product_id=$product_id"); 
	//include("view_product_action.php");
?>