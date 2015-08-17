<div class="cont">
            
                <div class="menu_trai">



<div class="tindocnhieu">
                	<div class="tdn_tieude">TIN ĐỌC NHIỀU</div>
						<?php 
							foreach($most as $rows)
							{
							$post_on = date("d-m-Y",strtotime($rows['post_on']));
						?>
                    <div class="tdn_noidung">
                    	<?php echo anchor("articles/detail/{$rows['article_id']}",$rows['title']); ?> - <span><?php echo $post_on."<br/>"."Lượt xem : ".$rows['count_view']; ?></span>
                    </div>
							<?php
							}
							?>
                   
</div>
  	
                </div>