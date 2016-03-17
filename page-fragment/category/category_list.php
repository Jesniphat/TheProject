
<?php
	if($categorys == FALSE)
	{
		echo "ยังไม่มีหมวดหมูสินค้ากรุณา". "<a href='page_controller.php?page=category/new_category_form_page'>"."Add Category"."</a>";
	}
	
	else
	{
?>
<p><a href="page_controller.php?page=category/new_category_form_page">Add Category</a></p>
<br>
<!-- Box -->
<div class="box">
	<!-- Box Head -->
	<div class="box-head">
		<h2 class="left">Category</h2>
	</div>
	<!-- End Box Head -->
	
	<!-- Table -->
	<div class="table">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th>CategoryID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Created</th>
				<th>Created By</th>
				<th width="110" class="ac">Content Control</th>
			</tr>

			<?php
				foreach($categorys as $category)
				{
			?>
			<tr>
				<td><?php echo $category["categoryId"]; ?></td>
				<td><?php echo $category["categoryName"]; ?></td>
				<td><?php echo $category["categoryDescription"]; ?></td>
				<td><?php echo mytime($category["createOn"]); ?></td>
				<td><?php echo $category["createter"]; ?></td>
				<td><a href="action_controller.php?action=category/delete_category_action&catId=<?php echo $category['categoryId']; ?>" class="ico del">Delete</a>
					<a href="action_controller.php?action=category/get_category_action&catId=<?php echo $category['categoryId']; ?>" class="ico edit">Edit</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</div>
	
</div>
<?php
	}
?>