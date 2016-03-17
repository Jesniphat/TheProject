<?php
	session_start();
	
		$productId = $_REQUEST["productId"];
		$name = $_REQUEST["productName"];
		$description = $_REQUEST["productDescription"];
		$price = $_REQUEST["productPrice"];
		$categoryId = $_REQUEST["categoryId"];
		$addBy = $_SESSION['login']['adminName'];
		$HotItem = $_REQUEST["HotItem"];
		
		if($HotItem == '1')
			{
				$HotItem = '1';
			}
			else {
				$HotItem = '0';
			}
		//$productimg = $_REQUEST["productimg"];
		/*
		//ย้ายรูปไปเก็บใน Folder ที่เราต้องการ
		$filename = $_FILES["productimg"]["tmp_name"];
		$name_file = $_FILES["productimg"]["name"];
		$upload_file = "product_cover_img/".$name_file;
		move_uploaded_file($filename,$upload_file);
		 * 
		 */
		
		include_once("function/product_data_access.php");
		update_product($name,$description,$price,$categoryId,$productId,$addBy,$HotItem);
		
		
		$_REQUEST["action"]="product/retrieve_product_action";
		include("action_controller.php");
	
?>