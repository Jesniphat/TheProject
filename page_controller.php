<?php
	//session_start();
	
	if(isset($_SESSION["login"]))
	{
		$page = $_REQUEST["page"];
		include("page/".$page.".php");
	}
	else
	{
		include("login_page.php");
	}
	
?>