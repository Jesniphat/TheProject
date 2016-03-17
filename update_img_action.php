<?php
	session_start();
	
	if(isset($_SESSION["login"]))
	{
	
	    $proId = $_REQUEST["proId"];
		
		//ย้ายรูปไปเก็บใน Folder ที่เราต้องการ
		$filename = $_FILES["proimg"]["tmp_name"];
		$filesize = $_FILES["proimg"]["size"];
		$name_file = $_FILES["proimg"]["name"];
		$upload_file = "product_img/".$name_file;
	    
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
			
			include_once("function/product_img_data_access.php");
			add_product_img($upload_file,$name_file,$proId);
			
			include("action/product/list_productimg_byproductid_action.php");
			}
			else
			{
				//$_REQUEST["page"]="product/addpic_error_page";
				//include("page_controller.php");
				include("action/product/list_productimg_byproductid_action.php");
			}
		
		}
	
	else
	{
		include("login_page.php");
	}
?>