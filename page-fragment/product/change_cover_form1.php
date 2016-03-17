<?php
	$productId = $_REQUEST["proId"];
	$categoryId = $_REQUEST["categoryId"];
?>

<form id="myform" action="action_controller.php?action=product/update_cover_action1" method="post" enctype="multipart/form-data" >
	
	<p>กรุณาเลือกรูปสินค้า</p>
	<br />
  	<input type="file" name="productimg" class="left" value="<?php $product['productimg']; ?>"/><br/>
  	<input type="hidden" name="productId" value="<? echo $productId; ?>">
  	<input type="hidden" name="categoryId" value="<? echo $categoryId; ?>">
	<br/>
  	<input type="submit" value="ChangPic" />
</form>