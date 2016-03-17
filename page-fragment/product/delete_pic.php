<?php
	$proId = $_REQUEST["proId"];
?>

<h1>รูปสินค้านี้ถูกลบเรียบร้อยแล้วค่ะ</h1>
<a href="action_controller.php?action=product/list_productimg_byproductid_action&proId=<? echo $proId ; ?>">
	Back</a>