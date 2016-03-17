<h1>สินค้าทั้งหมด</h1>
<div id="content">
		<div class="stuff">
			<?php
				foreach($product as $showProduct)
				{
			?>
			<div class="item">
				<a target="_blank" href="view_product_action.php?product_id=<php? echo $showProduct['productId'] ?>"><img src="<?php echo $showProduct["productimg"]; ?>" alt="" width="124" height="90" /></a>
				<a target="_blank" href="view_product_action.php?product_id=<php? echo $showProduct['productId'] ?>"><?php echo $showProduct["productName"]; ?></a>
				<span><?php echo $showProduct["price"]; ?></span>
				<a target="_blank" href="view_product_action.php?product_id=<php? echo $showProduct['productId'] ?>"><img src="images/Detial_Icon.png" alt="" width="53" height="19" /></a>
				<!--<a href="#"><img src="images/cart.gif" alt="" width="71" height="19" /></a>-->
			</div>
			<?php
				}
			?>
		</div>
		<div class="clear"></div>
		<div>
		<?php
   		page_first_last_text('<<','>>');
		page_prevnext_text('<','>');
		page_echo_pagenums(3, true,true);
		?>
		</div>
</div>