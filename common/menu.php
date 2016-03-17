<?php
	include_once("function/category_data_access.php");
	$categorys = read_all_category();
?>

<div id='cssmenu'>
<ul>
   <li><a href="admin.php"><span>หน้าแรก</span></a></li>
   <li><a href="action_controller.php?action=admin/retrieve_admin_action"><span>Admin</span></a></li>
   <li><a href="action_controller.php?action=category/retrieve_category_action"><span>Category</span></a></li>
   <li class='has-sub'><a href="action_controller.php?action=product/retrieve_product_action"><span>Products</span></a>
      <ul>
      <?php
   	foreach($categorys as $cat)
		{
	   ?>
         <li><a href="action_controller.php?action=product/retieve_product_bycatid_action&catId=<?php echo $cat['categoryId']; ?>"><span><?php echo $cat['categoryName']; ?></span></a></li>
       <?php
		}
		?>
		 <li class='last'><a href='#'><span>อื่นๆ</span></a></li>
      </ul>
   </li>
   <li><a href='#'><span>Member</span></a></li>
   <li><a href='#'><span>Slideshow Pic</span></a></li>
   <li><a href='#'><span>จัดการ Webboard</span></a></li>
   <li class='last'><a href='#'><span>การสั่งซื้อ</span></a></li>
</ul>
</div>