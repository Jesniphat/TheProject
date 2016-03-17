

<!-- Logo + Top Nav -->
<div id="top">
	<h1><a href="#">SpringTime</a></h1>
	
	<?php
		if(isset($_SESSION["login"]))
		{
	?>
	
	<div id="top-navigation">
		Welcome <a href="#"><strong><?php echo $_SESSION["login"]["adminName"]; ?></strong></a>
		<span>|</span>
		<a href="logout_action.php">Log out</a>
		<p>Design by Jesniphat Pukkham</p>
	</div>
	<?php
		}
	?>
</div>
<!-- End Logo + Top Nav -->