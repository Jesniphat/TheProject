<?php $cat = get_category_by_id($catId); ?>
<p style="color: red; font-size: 12px;"><?php echo $error ?></p>

<label><a href="action_controller.php?action=product/retieve_product_bycatid_action&catId=<?php echo $cat['categoryId'];?>">
		หมวด <?php echo $cat['categoryName']; ?></a></label><label>>></label>
<label><?php echo $pro['productName']; ?></label>
<br/><br/>


<?php
	if($proImg == FALSE)
	{
    	echo "สินค้านี้ยังไม่มีรูปภาพ";
	}
	else{
    foreach($proImg as $productImg)
	{
?>
		<img src="<?php echo $productImg["Img"];?>" width="250" />
		<br/>
		<p><?php echo $productImg["ImgName"] ?></p>
		<a href="action_controller.php?action=product/delete_pro_pic_action&proId=<?php echo $pro['productId']; ?>
		&proPicId=<?php echo $productImg['ProImgId'] ?>">ลบรูปนี้</a>
		<br/>
		<br/>
		<br/>
<?php
	}
	}
?>


<h1 id="textForm">ฟอร์มสำหรับเพิ่มรูปภาพสินค้า</h1>
<div id="addPicForm">
<form action="update_img_action.php" method="post" enctype="multipart/form-data" >
	
	<p>กรุณาเลือกรูปสินค้า</p>
	<br />
  	<input type="file" name="proimg" /><br/>
  	<!-- <label>ชื่อรูปภาพ</label> <br/>
  	<input type="text" name="productimgname" />
  	<br/>
  	-->
  	<input type="hidden" name="proId" value="<?php echo $pro['productId']; ?>"/>
	<br/>
	<p style="color: red; font-size: 12px;"><?php echo $error ?></p>
  	<input type="submit" value="เพิ่มรูปภาพ" />
</form>


</div>
