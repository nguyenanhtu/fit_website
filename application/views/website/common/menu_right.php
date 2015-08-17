<!--MENU PHẢI-->
    	<div class="menu_phai">
        	<div class="tindocnhieu">
                	<div class="tdn_tieude"><h2>TIN ĐỌC NHIỀU</h2></div>
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
                 <div class="thongke">
                 	<div class="tk">
                <!-- Histats.com  START  (standard)-->
				<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
                <a href="http://www.histats.com" target="_blank" title="free hit counter" ><script  type="text/javascript" >
                try {Histats.start(1,2659618,4,428,112,75,"00011111");
                Histats.track_hits();} catch(err){};
                </script></a>
                
                <!-- Histats.com  END  -->
                	</div>
               </div>
        </div>
        <!--END MENU PHẢI-->