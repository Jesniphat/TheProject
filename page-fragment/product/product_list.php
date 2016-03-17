<label style="color: red; font-size: 13px;"><?php echo $error; ?></label>
<br/>
<script>
	$(function(){
		$("#addProducts").click(addDlg);
		$("#send").click(addProduct);
		$("#bt-upload").click(uploadProCoverImg);
		$(".edit").click(edit);
		$(".del").click(deleteProd);
		// var myObject = {first:'A',secon:'B',three:'C'};
		// console.log(myObject);
		// console.log(myObject['first']);
		// console.log(myObject.secon);
	});
</script>
<?php
	//echo $products["0"]["productName"];
	//echo $products["0"]["0"];
	//echo $ABB;
	//print_r($products); 
?>
<?php

	if($products == FALSE)
	{
		echo "ยังไม่มีหมวดหมูสินค้ากรุณา". "<button type='button' id='addProducts'>เพิ่มสินค้า</button>";
	}
	
	else
	{
?>
<!-- <p><a href="action_controller.php?action=product/open_new_product_action">Add Product</a></p> -->
<button type="button" id="addProducts">เพิ่มสินค้า</button>
<br>
		<div id="SeachForm">
			<form action="action_controller.php?action=product/retrieve_product_action" method="post" accept-charset="utf-8">
				<input type="text" name="searchWord" />
				<input type="submit" value="ค้นหา" />
			</form>
		</div>
<br>
<div style="text-align:center">
<?php
	page_first_last_text('<<','>>');
	page_prevnext_text('<','>');
	page_echo_pagenums(3, true,true);
?>
</div>

<!-- Box -->
<div class="box">
	<!-- Box Head -->
	<div class="box-head">
		<h2 class="left">Product</h2>
	</div>
	<!-- End Box Head -->
	
	<!-- Table -->
	<div class="table">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Add On</th>
				<th>Add By</th>
				<th>หมวดหมู่</th>
				<th width="110" class="ac">Content Control</th>
				<th>PIC</th>
				<th>HotItem</th>
			</tr>

			<?php
				//echo $product["productName"];
				foreach($products as $product)
				{
			?>
			<tr>
				<td><?php echo $product["productName"]; ?></td>
				<td><?php echo $product["productDescription"]; ?></td>
				<td><?php echo $product["price"]; ?></td>
				<td><?php echo mytime($product["addOn"]); ?></td>
				<td><?php echo $product["addBy"]; ?></td>
				<td><?php echo $product["cname"]; ?></td>
				<td><a id="<?php echo $product['productId']; ?>" class="ico del">Delete</a>
					<a id="<?php echo $product['productId']; ?>" class="ico edit">Edit</a>
					<!--action_controller.php?action=product/get_product_action&proId=<?php echo $product['productId']; ?>-->
				</td>
				
				<td><img src="<?php echo $product["productimg"];?>" width="70" /><br/>
					<a href="page_controller.php?page=product/change_cover_page_form&proId=<?php echo $product['productId']; ?>">ChangePic</a><br />
					<a href="action_controller.php?action=product/list_productimg_byproductid_action&proId=<?php echo $product['productId']; ?>">เพิ่ม/ลบ รูปภาพสินค้า</a>
				</td>
				<td>
					<?php
					if( $product["hot"] == '1')
					{
					?>
						<img src="images/hot-icon2.gif" />
					<?php
					}
					else {
					?>
						<label>--</label>
					<?php
					}
					?>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</div>
	<label style="color: red; font-size: 13px;"><?php echo $error; ?></label>
	<br/>
</div>
<div style="text-align:center">
<?php
	}
	page_first_last_text('<<','>>');
	page_prevnext_text('<','>');
	page_echo_pagenums(3, true,true);
?>
</div>

<div id="dlg" style="display: none;">
	<form id="add_product">
		<input type="hidden" name="action" id="action" value="" />
		<p>กรุณาใส่ชื่อ สินค้า</p>
	  	<input class="left" id="productName" name="productName" type="text" /><br /><br />
	  	<p>กรุณาใส่คำอธิบายสินค้า</p>
	  	<input class="left" id="productDescription" name="productDescription" type="text" /><br/><br />
	  	<p>กรุณาใส่ราคา สินค้า</p>
	  	<input class="left" id="productPrice" name="productPrice" type="text" /><br/><br />
	  	
	  	<p>กรุณาเลือกหมวดหมู่สินค้า</p>
	  	<select name="categoryId">
			<?php
				foreach($categorys as $cat)
				{
			?>
			<option 
			<?php
			$category_id = $_REQUEST["catId"];
				if(isset($category_id))
				{
					if($category_id == $cat["categoryId"])
					{
						echo "selected='selected'";
					}
				}
			?>
			value="<?php echo $cat["categoryId"]; ?>"><?php echo $cat["categoryName"]; ?></option>
			<?php
				
				}
			?>
		</select>
	  	<br/>
	  	<p>Hot Item</p>
	  	<input type="checkbox" name="HotItem" value="1"/><br/>
	</form>
	<p>กรุณาเลือกรูปหน้าปกสินค้า</p><br/>
	<form id="formcoverImg" method="post" action="ajax_product_action.php" enctype="multipart/form-data">
		<input type="hidden" name="action" id="proImg" value="insertCoverImg" />
	  	<input type="file" name="proCoverImg" id="proCoverImg" /><br/><br />
	  	<button type="submit" id="bt-upload" style="display: none">อัปโหลดภาพ</button>
	</form>
	<button type="button" id="send">เพิ่มสินค้า</button>
</div>
