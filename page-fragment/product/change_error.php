<?php
	echo $error;
	echo "<br/>";
?>
	<a href="page_controller.php?page=product/change_cover_page_form&proId=<? echo $proId; ?>">
		กลับไปเลือกรูปใหม่</a>
		
	<br/>
		
	<a href="action_controller.php?action=product/retrieve_product_action">กลับหน้ารายการสินค้า</a>
<?php
	//echo $proId ;
?>
