 
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/layout.css"/>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/menu.css"/>
 <div class="menu_trai">
	  <div class="container">

            <span id="clr1"></span>
            <span id="clr2"></span>
            <span id="clr3"></span>
            <span id="clr4"></span>
            <span id="clr5"></span>
            <span id="clr6"></span>

            <div class="colorScheme">
                <a href="#clr1" class="clr1"></a>
                <a href="#clr2" class="clr2"></a>
                <a href="#clr3" class="clr3"></a>
                <a href="#clr4" class="clr4"></a>
                <a href="#clr5" class="clr5"></a>
                <a href="#clr6" class="clr6"></a>
            </div>

            <ul id="nav">
				<li><a href="">Trang Chủ</a></li>
				<?php
		/*echo "<pre>";
		print_r($temp2);
		echo "</pre>";
		echo "<pre>";
		print_r($temp3);
		echo "</pre>";*/
		
		foreach($temp3 as $t3)
		{
		if(!empty($t3['cat_name']))
		{
		?>
                <li><a href="#"><?php  echo $t3['cat_name'];  ?></a>
		<?php
		}
		?>
                    <ul class="subs">
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
		
		foreach($temp4 as $t4)
		{
			echo "<li>";
			echo anchor("",$t4['cat_name']);
			echo "</li>";
		}
	?>
                <li><a href="http://www.script-tutorials.com/css3-vertical-multicolor-3d-menu/">Back</a></li>
            </ul>

        </div>
 </div>