<?php
	
?>

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
		categoryName: {
          required: true,
          minlength: 5
		},
		categoryDescription:{
		  required: true,
          minlength: 5
		}
	  },
  		
	  
	  messages: {
		 categoryName: {
	       required: "กรุณาใส่ชื่อหมวดหมู่สินค้า",
	       minlength: jQuery.format("At least {0} characters required!")
         },
		 categoryDescription:{
			required: "กรุณาใส่คำอธิบาย",
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

<form id="myform" action="action_controller.php?action=category/create_category_action" method="post">
	<p>กรุณาใส่ชื่อ Category</p>
  	<input class="left" id="categoryName" name="categoryName" type="text" /><br/>
  	<p>กรุณาใส่คำอธิบาย</p>
  	<input class="left" id="categoryDescription" name="categoryDescription" type="text" /><br/>
  	<br/>
  	<input type="submit" value="Add category" />
</form>