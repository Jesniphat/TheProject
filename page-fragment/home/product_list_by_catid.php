<script type="text/javascript">
$(function(){
	$('.prodDetail').click(showProductDetailHome);
});
</script>
<h1>รายการสินค้า <?php echo $category["categoryName"]; ?></h1>
<h3><?php echo $category["categoryDescription"]; ?></h3>



<div id="content">
		<div class="stuff">
			<?php
				foreach($product as $showProduct)
				{
			?>
			<div class="item">
				<div style="float: left; margin:3px;">
					<img src="<?php echo $showProduct["productimg"]; ?>" alt="" width="124" height="90" />
				</div>
				<?php echo $showProduct["productName"]; ?><br/>
				<label style="color:blue;">ราคา <?php echo $showProduct["price"]; ?></label><br/>
				<button class="prodDetail" id="<?php echo $showProduct['productId']; ?>">รายละเอียด</button>			
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
<div id='divShowPic' style="display:none; text-align: center;">
<img class="sPic" width="500px" src="">
</div>