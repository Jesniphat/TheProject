<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>E-Shop</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="js/jquery-ui.min.css" type="text/css" media="all" /> 	
<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/jquery.blockUI.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript" src="js/product.js"></script>
</head>
<body>
<div id="mypage">
	<div id="header">
		<a href="index.html" class="float"><img src="images/logo.jpg" alt="" width="171" height="73" /></a>																																																		
	    
		<div class="topblock2">
			<?php include("common/home/cart.php"); ?>
		</div>
		<?php include("common/home/menu.php");?>
	</div>
	
	<div id="container">																																																																																																																																																																											
	  <div id="center" class="column">
	  	<?php include($_home_layout_content); 
	  	// $x = ($product);
	  	// echo $_home_layout_content;
	  	?>
	  </div>
	  <div id="left" class="column">
	  	<?php include("common/home/categoryBar.php"); ?>
	  </div>
	  <div id="right" class="column">
	  	<?php include("common/home/rightPic.php"); ?>
		<div class="rightblock">
			<?php //include("common/home/loginBlock.php"); ?> 
			<?php include("common/home/otherRightBlock.php"); ?>
		</div>
	  </div>
	</div>
	
	<div id="footer">
		<?php include("common/home/footter.php"); ?>
	</div>
</div>
</body>
</html>
