<?php include("common/home/banner.php"); ?><br />
	  	
<div id="aboutme">
  	<?php include("common/home/aboutme.php"); ?>
</div>

<div id="content">
	<img src="images/title3.png" alt="" width="540" height="26" class="pad25" />
		<div class="stuff">
			<?php
				foreach($product as $showProduct) //ดึงข้อมูลโปรดักทั้งหมด
				{
			?>
			<div class="item">
				<a target="_blank" href="view_product_action.php?product_id=<?php echo $showProduct['productId'] ?>"><img src="<?php echo $showProduct["productimg"]; ?>" alt="" width="124" height="90" /></a>
				<a target="_blank" href="view_product_action.php?product_id=<?php echo $showProduct['productId'] ?>"><?php echo $showProduct["productName"]; ?></a>
				<span><? echo $showProduct["price"]; ?></span>
				<a target="_blank" href="view_product_action.php?product_id=<?php echo $showProduct['productId'] ?>"><img src="images/Detial_Icon.png" alt="" width="53" height="19" /></a>
				<!--<a href="#"><img src="images/cart.gif" alt="" width="71" height="19" /></a>-->
			</div>
			<?php
				}
			?>
			<p class="seemore"><a href="list_all_product_action.php">ดูทั้งหมด...</a></p>
		</div>
		
	<img src="images/title4.png" alt="" width="540" height="26" class="pad25" />
		<div class="stuff">
			<?php
				foreach($hotproduct as $showHotProduct) //ดึงข้อมูล hotProduct ทั้งหมด
				{
			?>
			<div class="item">
				<a target="_blank" href="view_product_action.php?product_id=<?php echo $showHotProduct['productId'] ?>"><img src="<?php echo $showHotProduct["productimg"]; ?>" alt="" width="124" height="90" /></a>
				<a target="_blank" href="view_product_action.php?product_id=<?php echo $showHotProduct['productId'] ?>"><? echo $showHotProduct["productName"]; ?></a>
				<span><?php echo $showHotProduct["price"]; ?></span>
				<a target="_blank" href="view_product_action.php?product_id=<?php echo $showHotProduct['productId'] ?>"><img src="images/Detial_Icon.png" alt="" width="53" height="19" /></a>
				<!--<a href="#"><img src="images/cart.gif" alt="" width="71" height="19" /></a>-->
			</div>
			<?php
				}
			?>
			<p class="seemore"><a href="list_hot_product_action.php">ดูทั้งหมด...</a></p>
		</div>
</div>