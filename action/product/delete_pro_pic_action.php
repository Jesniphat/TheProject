<?php
    
    $proId = $_REQUEST['proId'];
    $proPicId = $_REQUEST['proPicId'];
	
	include_once("function/product_img_data_access.php");
	delete_propic($proPicId);
	
	
	$_REQUEST["page"]= $proId;
	include("action/product/list_productimg_byproductid_action.php");
    
     
?>