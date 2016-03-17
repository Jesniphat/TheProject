
<script type="text/javascript" src="js/jquery-1.4.js"></script>
<script type="text/javascript" src="js/validation.js"></script>

<script type="text/javascript">
	jQuery.validator.setDefaults({
		debug: true,
		success: "valid"
	});
</script>
		
<script>
  $(document).ready(function(){
    $("#myform").validate(
	{	
		 submitHandler: function(form) {
			form.submit();
			},
			
	  rules: {
		productName: {
          required: true,
          minlength: 5
		},
		productDescription:{
		  required: true,
          minlength: 5
		},
		productPrice:{
		  required: true,
          minlength: 1
		}
	  },
  		
	  
	  messages: {
		 productName: {
	       required: "กรุณาใส่ชื่อสินค้า",
	       minlength: jQuery.format("At least {0} characters required!")
         },
		 productDescription:{
			required: "กรุณาใส่คำอธิบาย",
	       minlength: jQuery.format("At least {0} characters required!")
		},
		 productPrice:{
			required: "กรุณาใส่ราคาสินค้า",
	       minlength: jQuery.format("At least {0} characters required!")
		}
		 
	  }
	});
	
  });
</script>


<style>
	#field { margin-left: .5em; float: left; }
  	#field, label { float: left; font-family: Arial, Helvetica, sans-serif; font-size: small; }
	br { clear: both; }
	input { border: 1px solid black; margin-bottom: .5em;  }
	input.error { border: 1px solid red; }
	label.error {
		background: url('http://dev.jquery.com/view/trunk/plugins/validate/demo/images/unchecked.gif') no-repeat;
		padding-left: 16px;
		margin-left: .3em;
	}
	label.valid {
		background: url('http://dev.jquery.com/view/trunk/plugins/validate/demo/images/checked.gif') no-repeat;
		display: block;
		width: 16px;
		height: 16px;
	}
</style>

<form id="myform" action="action_controller.php?action=product/update_product_action" method="post" >

	<input type="hidden" name="productId" value="<? echo $product["productId"]; ?>">

	<p>กรุณาใส่ชื่อ สินค้า</p>
  	<input class="left" id="productName" name="productName" type="text" value="<?php echo $product['productName']; ?>" /><br/>
  	<p>กรุณาใส่คำอธิบายสินค้า</p>
  	<input class="left" id="productDescription" name="productDescription" type="text" value="<?php echo $product['productDescription']; ?>"/><br/>
  	<p>กรุณาใส่ราคา สินค้า</p>
  	<input class="left" id="productPrice" name="productPrice" type="text" value="<?php echo $product['price']; ?>"/><br/>
  	
  	
  	<p>กรุณาเลือกหมวดหมู่สินค้า</p>
  	<select name="categoryId">
		<?php
			foreach($category as $cat)
			{
		?>
		<option
		
		<?php
			if($product["categoryId"]==$cat["categoryId"])
			{
				echo "selected='selected'";
			}
		?>
		
		 value="<? echo $cat["categoryId"]; ?>"><? echo $cat["categoryName"]; ?></option>
		<?php
			
			}
		?>
	</select>
  	<br/>
  	
  	<p>Hot Item</p>
  	<?php
  	   if($product["hot"]=='1'){
  	?>
  	   <input type="checkbox" checked="checked" name="HotItem" value="1"/><br/>
  	<?php
	 }
	 else{
	?>
	 	<input type="checkbox" name="HotItem" value="1"/><br/>
	<?php
	 }
	?>
  	
  	<br/>
  	<input type="submit" value="Edit Product" />
</form>