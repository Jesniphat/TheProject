<?php
	session_start();
	
	if(isset($_SESSION["login"]))
	{
		$_admin_layout_content = "page-fragment/admin.php";
		include ("layout/home_admin_layout.php");
	}
	
	else {
		include("login_page.php");
	}
	
	
	
	
	

?>