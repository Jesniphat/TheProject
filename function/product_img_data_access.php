<?php

    session_start();
	
	include_once("setting/database_setting.php");
	
	
	function get_product_img_by_id($ProId)
	{
		$con = connect_db();
		$result = mysqli_query($con,"select * from product_img where productId='$ProId'");
		
		$productsImg = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($productsImg,$row);
		}
		
		mysqli_close($con);
		return $productsImg;	
	}
	
	function add_product_img($upload_file,$name_file,$productId)
	{
		$con = connect_db();
			
			$sql = "
			insert into product_img(Img,ImgName,productId)
			values('$upload_file','$name_file','$productId')";
			
			if (!mysqli_query($con,$sql))
			{
				die("เกิดปัญหา: ".mysqli_error($con));
			}
			
			$img_id = mysqli_insert_id($con);
			return $img_id;
	}
	
	function delete_propic($proPicId)
	{
		$con = connect_db();
		
		$sql_dl = "delete from product_img where ProImgId=$proPicId";
		
		if(!mysqli_query($con,$sql_dl))
		{
			die("สั่งงานฐานข้อมูลไม่ได้เพราะ :".mysqli_error($con));
		}
		mysqli_close($con);
	}
	function read_produc_img_byid($product_id)
	{
		$con = connect_db();
		$result = mysqli_query($con,"select * from product_img where productId='$product_id'");
		
		$productsImg = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($productsImg,$row);
		}
		
		mysqli_close($con);
		return $productsImg;
	}
?>