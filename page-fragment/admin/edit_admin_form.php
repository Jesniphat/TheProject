<?php
	//session_start();
	$theadmin = $_SESSION["edit_admin"];
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
		name: {
          required: true,
          minlength: 2
		},
		lastname:{
		  required: true,
          minlength: 2
		},
		userName:{
		  required: true,
          minlength: 2
		},
		passWord:{
		  required: true,
          minlength: 2
		},
		adminEmail:{
		  required: true,
          minlength: 2,
          email:true
		}
	  },
  		
	  
	  messages: {
		 name: {
	       required: "กรุณาใส่ชื่อ",
	       minlength: jQuery.format("At least {0} characters required!")
         },
		 lastname:{
			required: "กรุณาใส่นามสกุล",
	       minlength: jQuery.format("At least {0} characters required!")
		},
		 userName:{
			required: "กรุณาใส่userName",
	       minlength: jQuery.format("At least {0} characters required!")
		},
		 passWord:{
			required: "กรุณาใส่รหัสผ่าน",
	       minlength: jQuery.format("At least {0} characters required!")
		},
		 adminEmail:{
			required: "กรุณาใส่อีเมลล์",
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

<h2>แบบฟอร์มแก้ไขข้อมูลสมาชิก</h2>
<p><?php echo $error_massager; ?></p>
<form id="myform" action="action_controller.php?action=admin/update_admin_action" method="post">
	
	<input type="hidden" name="admin_id" value="<?php echo $theadmin["id"]; ?>" />
	
	<p>กรุณาใส่ชื่อ</p>
  	<input class="left" id="name" name="name" type="text" value="<?php echo $theadmin["adminName"];?>" /><br/>
  	<p>กรุณาใส่นามสกุล</p>
  	<input class="left" id="lastname" name="lastname" type="text" value="<?php echo $theadmin["adminLastname"]; ?>" /><br/>
  	<p>กรุณาใส่UserName</p>
  	<input class="left" id="userName" name="userName" type="text" value="<?php echo $theadmin["username"]; ?>" /><br/>
  	<p>กรุณาใส่รหัสผ่าน</p>
  	<input class="left" id="passWord" name="passWord" type="password" value="<?php echo $theadmin["password"]; ?>" /><br/>
  	<p>กรุณาใส่อีเมลล์</p>
  	<input class="left" id="adminEmail" name="adminEmail" type="text" value="<?php echo $theadmin["email"]; ?>" /><br/>
  	<br/>
  	<input type="submit" value="Edit Admin" />
</form>