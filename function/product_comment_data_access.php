<?php
	include_once("setting/database_setting.php");
	
	function read_product_comment_by_productid($product_id)
	{
		$con = connect_db();
		$c = "select * from productcomment where productid='$product_id'";
		$result = mysqli_query($con,$c);
		
		$productcomment = array();
		while($row = mysqli_fetch_array($result))
		{
			array_push($productcomment, $row);
		}
		
		mysqli_close($con);
		
		return $productcomment;
		
	}
	
	function create_product_comment($writername,$comment,$product_id)
	{
		$con = connect_db();
			
			$sql = "
			insert into productcomment(writername,comment, productid)
			values('$writername','$comment','$product_id')
			";
			
			if (!mysqli_query($con,$sql))
			{
				die("เกิดปัญหา: ".mysqli_error($con));
			}
			
			$product_comment = mysqli_insert_id($con);
			return $product_comment;
	}
	
?>