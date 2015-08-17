<div class="sidebar khoi-sidebar-left khoi-sidebar-trang-trong khoi-vjustyfy" id="sidebar-left" style="height: 2042px;">
          
          <div class="clear-block block block-nice_menus block-primary block-menu-tren" id="block-nice_menus-1">


	
  <div class="content"><ul id="nice-menu-1" class="nice-menu nice-menu-right sf-js-enabled">
	<?php
		/*echo "<pre>";
		print_r($temp2);
		echo "</pre>";
		echo "<pre>";
		print_r($temp3);
		echo "</pre>";*/
		foreach($temp3 as $t3)
		{
	?>
	<li class="menu-17907 menuparent menu-path-node-75594 even ">
		<a href=""><?php if(!empty($t3['cat_name'])) {echo $t3['cat_name']; }; ?> </a>
			<ul>
				<?php
				if(!empty($t3['cat_id']))
				{
				foreach($temp2 as $t2)
				{
					foreach($t2 as $t22)
					{
						if($t22['parent_id'] == $t3['cat_id'])
						{
							echo "<li>";
								echo anchor("",$t22['cat_name']);
							echo "</li>";
						}
					}

				}
				}
				?>
			</ul>
	</li>
	<?php
		}
	?>

</ul>
</div>
</div>








        </div>