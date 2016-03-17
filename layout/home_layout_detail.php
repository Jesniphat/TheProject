<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>E-Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
</head>

<body>
	<div id="header">
		<a href="index.html" class="float"><img src="images/logo.jpg" alt="" width="171" height="73" /></a>																																																		
	    
		<div class="topblock2">
			<?php include("common/home/cart.php"); ?>
		</div>
		<?php include("common/home/menu.php");?>
	</div>
	
	<div id="container1">																																																																																																																																																																											
	  <div id="center" class="column">
	  	<?php include($_home_layout_detail_content); ?>
	  </div>
	  <div id="left" class="column">
	  	<?php include("common/home/categoryBar.php"); ?>
	  </div>
	</div>
	
	<div id="footer">
		<?php include("common/home/footter.php"); ?>
	</div>
</body>
</html>
