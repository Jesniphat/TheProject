<?php
	session_start();
	
	if(isset($_SESSION["login"]))
	{

			$productName = $_REQUEST["productName"];
			$productDescription = $_REQUEST["productDescription"];
			$productPrice = $_REQUEST["productPrice"];
			$categoryId = $_REQUEST["categoryId"];
			$addBy = $_SESSION["login"]["adminName"];
			$HotItem = $_REQUEST["HotItem"];
			
			if(isset($HotItem))
			{
				$HotItem = '1';
			}
			else {
				$HotItem = '0';
			}
			
			//ย้ายรูปไปเก็บใน Folder ที่เราต้องการ
			$filename = $_FILES["productimg"]["tmp_name"];
			$name_file = $_FILES["productimg"]["name"];
			$upload_file = "product_cover_img/".$name_file;
			
			$error = "";
			if($filesize > 20000)
			{
				$error .= "*ไฟร์ขนาดใหญ่เกินไป";
			}
			if(file_exists($upload_file))
			{
				$error .= "*มีไฟร์นี้อยู่แล้ว กรุณาเปลี่ยนชื้อไฟร์";
			}
			
			if($error == "")
			{
			move_uploaded_file($filename,$upload_file);
			
			include_once("function/product_data_access.php");
			create_product($productName,$productDescription,$productPrice,$categoryId,$addBy,$upload_file,$HotItem);
			
			$_REQUEST["catId"]=$categoryId;
			include("action/product/retieve_product_bycatid_action.php");
			}
			else
			{
				$_REQUEST["catId"]=$categoryId;
				include("action/product/retieve_product_bycatid_action.php");
			}
	
	}
	
	else
	{
		include("login_page.php");
	}
	
?>