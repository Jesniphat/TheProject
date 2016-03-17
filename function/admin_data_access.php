<?php
	session_start();
	
	include_once("setting/database_setting.php");
	
	function reed_admin_by_user_name($username)
	{
		$con = connect_db();
		
		$result = mysqli_query($con,"select * from admin where username = '$username'");
		
		$admin = mysqli_fetch_array($result);
		
		return $admin;
		
	}
	
	function read_all_admin()
	{
		$con = connect_db();
		
			$query = "select * from admin order by id DESC";
			$result = mysqli_query($con,$query);
			
			$admin = array();
			
			while($row = mysqli_fetch_array($result))
			{
				array_push($admin, $row);
			}
			return $admin;
		
	}
	
	function delete_admin($admin_id)
	{
		$con = connect_db();
		
			$sql = "delete from admin where id=$admin_id";
			
			if(!mysqli_query($con,$sql))
			{
			die("ลบข้อมมูลผิดพลาด :".mysqli_error($con));
			}
		
	}
	
	function create_admin($adminName,$adminLastName,$adminUserName,$adminPassWord,$adminEmail)
	{
		$con = connect_db();
			
			$sql = "insert into admin(adminName,adminLastname,username,password,email)
			values('$adminName','$adminLastName','$adminUserName','$adminPassWord','$adminEmail')";
			
			if (!mysqli_query($con,$sql))
			{
				die("เกิดปัญหา: ".mysqli_error($con));
			}
			
			$admin_id = mysqli_insert_id($con);
			return $admin_id;
	}
	
	function read_admin_by_username($username)
	{
		$con = connect_db();
		
		$result = mysqli_query($con,"select * from admin where username = '$username'");
		
		$admin = mysqli_fetch_array($result);
		
		return $admin;
			
	}
	function read_admin_by_email($adminEmail)
	{
		$con = connect_db();
		
		$result = mysqli_query($con,"select * from admin where email = '$adminEmail'");
		
		$adminEmail = mysqli_fetch_array($result);
		
		return $adminEmail;
	}
	
	function get_admin_by_id($admin_id)
	{
		$con = connect_db();
		
		$result = mysqli_query($con,"select * from admin where id = $admin_id");
		
		$admin = mysqli_fetch_array($result);
		
		return $admin;
			
	}
	
	function update_admin($admin_id,$adminName,$adminLastName,$adminUserName,$adminPassWord,$adminEmail)
	{
		$con = connect_db();
		
		$sql_ud = "update admin
				set adminName = '$adminName',
					adminLastname = '$adminLastName',
					username = '$adminUserName',
					password = '$adminPassWord',
					email = '$adminEmail'
				where id = $admin_id
				";
		if(!mysqli_Query($con,$sql_ud))
		{
			die("สั่งงานฐานข้อมมูลผิดพลาดเพราะ :".mysqli_error($con));
		}
		
	}
?>