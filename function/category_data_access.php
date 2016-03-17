<?php
	//session_start();
	
	include_once("setting/database_setting.php");
	
	
	function read_all_category()
	{
		$con = connect_db();
		
			$query = "select * from category";
			$result = mysqli_query($con,$query);
			
			$category = array();
			
			while($row = mysqli_fetch_array($result))
			{
				array_push($category, $row);
			}
			return $category;
		
	}
	
	function create_category($categoryName,$categoryDescription,$createter)
	{
		$con = connect_db();
			
			$sql = "
					insert into category(categoryName,categoryDescription,createter,createOn)
					values('$categoryName','$categoryDescription','$createter',NOW())
					";
			if(!mysqli_query($con,$sql))
			{
				die("สั่งงานฐานข้อมูลผิดพลาด :".mysqli_error($con));
			}
			
			$category_id = mysqli_insert_id($con);
			
			return $category_id;
	}
	
	function delete_categyry($catId)
	{
		$con = connect_db();
		
		$sql_dl = "delete from category where categoryId=$catId";
		if(!mysqli_query($con,$sql_dl))
		{
			die("สั่งงานฐานข้อมูลไม่ได้เพราะ :".mysqli_error($con));
		}
		mysqli_close($con);
	}
	
	function get_category_by_id($catId)
	{
		$con = connect_db();
		$result = mysqli_query($con,"select * from category where categoryId='$catId'");
		$category = mysqli_fetch_array($result);
			
		return $category;
		
	}
	
	function update_category($catID,$categoryName,$categoryDescription,$categoryCreateOn,$categoryCreateter)
	{
		$con = connect_db();
		
		$sql_ud = "update category
				set categoryName = '$categoryName',
					categoryDescription = '$categoryDescription',
					createOn = '$categoryCreateOn',
					createter = '$categoryCreateter'	
				where categoryId = $catID
				";
		if(!mysqli_Query($con,$sql_ud))
		{
			die("สั่งงานฐานข้อมมูลผิดพลาดเพราะ :".mysqli_error());
		}
	}
?>