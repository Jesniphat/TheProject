
<p><a href="page_controller.php?page=admin/new_admin_form_page">Add Admin</a></p>
<br>

<!-- Box -->
<div class="box">
	<!-- Box Head -->
	<div class="box-head">
		<h2 class="left">Admin</h2>
	</div>
	<!-- End Box Head -->
	
	<!-- Table -->
	<div class="table">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th>Name</th>
				<th>Lastname</th>
				<th>Username</th>
				<th width="110" class="ac">Content Control</th>
			</tr>
			<?php
				foreach($admins as $admin)
				{
			?>
			<tr>
				<td><?php echo $admin["adminName"]; ?></td>
				<td><?php echo $admin["adminLastname"]; ?></td>
				<td><?php echo $admin["username"]; ?></td>
				<td><a href="action_controller.php?action=admin/delete_admin_action&admin_id=<?php echo $admin['id']; ?>" class="ico del">Delete</a>
					<a href="action_controller.php?action=admin/edit_admin_action&admin_id=<?php echo $admin['id']; ?>" class="ico edit">Edit</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</div>
	
</div>

