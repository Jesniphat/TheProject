<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jquery ui autocomplete</title>
<style type="text/css">
body {
	font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
	font-size:12px;
}
</style>
<?php
$jquery_ui_v="1.8.5";
$theme=array(
	"0"=>"base",
	"1"=>"black-tie",
	"2"=>"blitzer",
	"3"=>"cupertino",
	"4"=>"dark-hive",
	"5"=>"dot-luv",
	"6"=>"eggplant",
	"7"=>"excite-bike",
	"8"=>"flick",
	"9"=>"hot-sneaks",
	"10"=>"humanity",
	"11"=>"le-frog",
	"12"=>"mint-choc",
	"13"=>"overcast",
	"14"=>"pepper-grinder",
	"15"=>"redmond",
	"16"=>"smoothness",
	"17"=>"south-street",
	"18"=>"start",
	"19"=>"sunny",
	"20"=>"swanky-purse",
	"21"=>"trontastic",
	"22"=>"ui-darkness",
	"23"=>"ui-lightness",
	"24"=>"vader"
);
$jquery_ui_theme=$theme[11];
?>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/<?=$jquery_ui_v?>/themes/<?=$jquery_ui_theme?>/jquery-ui.css" />
<style>
/*   css ส่วนของรายการที่แสดง  */
.ui-autocomplete {
	/*	width:230px;*/
/*	max-height:200px;
	overflow:scroll;*/
}
.ui-button {
	margin-left: -1px;
}

.ui-button-icon-only .ui-button-text {
	padding: 0.35em;
}
/* css ส่วน textbox  */
.ui-autocomplete-input {
	font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
	font-size:12px;	
	height:18px;
	width:200px;
}
/*  css  ส่วนปุ่มคลิกเลือกแสดงรายการทั้งหมด*/
.myselect{
/*	border:0px solid;*/
	width:20px;
	height:25px;
}
</style>
<link rel="stylesheet" href="js/jquery-ui.min.css" type="text/css" media="all" /> 
	<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/jquery.blockUI.js" type="text/javascript"></script>
	<script src="js/jquery.form.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/product.js"></script>
</head>

<body>



  <label for="tags">Tags: </label>
  <input id="tags" />
<script type="text/javascript">
	$(function() {
		// กำหนดค่าแบบตายตัวสำหรับ ใช้งาน autocomplete
		var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"ทดสอบข้อความภาษาไทย"
		];
		$( "#tags" ).autocomplete({ // ใช้งาน autocomplete กับ input text id=tags
			minLength: 1, // กำหนดค่าสำหรับค้นหาอย่างน้อยเป็น 0 สำหรับใช้กับปุ่ใแสดงทั้งหมด
			source: availableTags// กำหนดให้ใช้ค่าจากตัวแปรที่กำหนดข้างต้น
		});



	});
</script>
</body>
</html>