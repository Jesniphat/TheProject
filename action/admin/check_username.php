<?php
	$username = $_REQUEST["UserName"];
	
	include_once("function/admin_data_access.php");
	$checkUsername = read_admin_by_username($username);


	if($checkUsername == FALSE)
	{
		echo TRUE;
	}
	else
	{
		echo FALSE;
	}
?>