<?php
	define("DB_SERVER","localhost");
	define("DB_USERNAME","root");
	define("DB_PASSWORD","p@ssw0rd");

	function connect_db()
	{
		$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);//เชื่อมต่อกับโปรแกรมฐานข้อมูล MySQL

			if(!$con)
			{
				die("เกิดปัญหาไม่สามารถเชื่อมต่อกับฐานข้อมูลได้ เพราะ ".mysql_error());
			}

			mysqli_select_db($con,"project");//เลืิอกฐานข้อมูล

			mysqli_query($con,"SET NAMES utf8");//บอกการเข้ารหัสตัวอักษรของข้อมูลที่เก็บในฐานข้อมูล
			return $con;
	}
?>
