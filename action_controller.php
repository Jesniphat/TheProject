<?php
	session_start();
	
	if(isset($_SESSION["login"]))
	{
		$action = $_REQUEST["action"];

		include("action/".$action.".php");
	
	}
	else
	{
		include("login_page.php");
	}

?>