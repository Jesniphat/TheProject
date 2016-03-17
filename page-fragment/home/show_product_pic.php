<div style="text-align: center;">
	
	<img src="<? echo $product['productimg']; ?>" width="450px" />
	<br />
	<br />
	<ul>
		<?php
			foreach($product_img as $show_img)
			{
		?>
		<li style="list-style: none;">
			<div>
				<img src="<? echo $show_img['Img']; ?>" width="450px" />
			</div>
		</li>
		<br />
	</ul>
		<?php
			}
		?>
</div>