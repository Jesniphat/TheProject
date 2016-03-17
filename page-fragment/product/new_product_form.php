
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
<?php echo $error; ?>
<form id="myform" action="action_controller.php?action=product/create_product_action" method="post" enctype="multipart/form-data">
	<p>กรุณาใส่ชื่อ สินค้า</p>
  	<input class="left" id="productName" name="productName" type="text" /><br/>
  	<p>กรุณาใส่คำอธิบายสินค้า</p>
  	<input class="left" id="productDescription" name="productDescription" type="text" /><br/>
  	<p>กรุณาใส่ราคา สินค้า</p>
  	<input class="left" id="productPrice" name="productPrice" type="text" /><br/>
  	
  	<p>กรุณาเลือกรูปสินค้า</p>
  	<input type="file" name="productimg" class="left" value="<?php $product['productimg']; ?>"/><br/>
  	
  	<p>กรุณาเลือกหมวดหมู่สินค้า</p>
  	<select name="categoryId">
		<?php
			foreach($category as $cat)
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
  	<br/>
  	<input type="submit" value="Add Product" />
</form>