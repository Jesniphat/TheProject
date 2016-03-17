<?php
	session_start();
	
	if(isset($_SESSION["login"]))
	{
		$proId = $_REQUEST["productId"];
		$categoryId = $_REQUEST["categoryId"];
		
		//ย้ายรูปไปเก็บใน Folder ที่เราต้องการ
		$filename = $_FILES["productimg"]["tmp_name"];
		$filesize = $_FILES["productimg"]["size"];
		$name_file = $_FILES["productimg"]["name"];
		$upload_file = "product_cover_img/".$name_file;
		
		$error = "";
		if($filesize > 2000000)
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
		update_cover_pic($proId,$upload_file);
		
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