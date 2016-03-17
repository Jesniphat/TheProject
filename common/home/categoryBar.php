<?php
	include_once("function/category_data_access.php");
	$category = read_all_category();
?>



<div class="block">
		<img src="images/title1.gif" alt="" width="168" height="42" /><br />
			<ul id="navigation">
				<?php
					foreach($category as $cat)
					{
				?>
				<li class="color"><a href="list_product_by_catid_action.php?cat_id=<?php echo $cat["categoryId"]; ?>"><?php echo $cat["categoryName"] ?></a></li>
				<?php
					}
				?>
			</ul>
			</ul>
		</div>
		

		<a href="#"><img src="images/banner1.jpg" alt="" width="172" height="200" /></a>