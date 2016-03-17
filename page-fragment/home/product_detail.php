<?php
include ("lib/IMGallery/imgallery-no-jquery.php");
	$set = gallery_new_set();
	gallery_add_set($set,"$product[productimg]");
	foreach($product_img as $show_img)
	{
		gallery_add_set($set,"$show_img[Img]");
	}
	gallery_echo_set($set);
?>
