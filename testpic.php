<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
<?php
	include "lib/IMGallery/imgallery-no-jquery.php";
	// slider_width(600);
	// slider_height(150);
	//slider_bg_color("#abc");
	// $set =slider_new_set();
	// slider_add_set($set, "product_img/01.jpg");
	// slider_add_set($set, "product_img/02.jpg");
	// slider_add_set($set, "product_img/03.jpg");
	// slider_echo_set($set);
	gallery_echo_img("product_img/03.jpg");
	gallery_echo_img("product_img/02.jpg");
	gallery_echo_img("product_img/01.jpg");
?>
