<?php
	$this->load->view("website/common/header");
?>


			<div class="cont">
    
                <div class="noidung">
                    <div class="menu">
                   
                            <li><span class="mleft"></span>
                            <a href="#">Tin tức mới</a>
                            <span class="mright"></span>
                            </li>
                            
                            	<div class="thanhngang"></div>
                    </div>
                    <div class="tc_baiviet">
                        <div class="tc_anh">
						<?php
							if(empty($news['thumbnail']))
							{
							$path = "no-image.jpg";
							}
							else
							{
							$path = $news['thumbnail'];
							}
						?>
                        	<img src="<?php echo base_url(); ?>public/ckeditor/kcfinder/upload/.thumbs/images/<?php echo $path; ?>" width="120px" height="100px" border="1px solid red" />
                        </div>
                        <div class="tc_tomtat">
                        	<?php
								echo anchor("articles/detail/{$news['article_id']}",$news['title'])."<br/><br/>";
								echo $news['description'];
							?>
                        </div>
                        
                    </div>
                    <div class="tc_tinlq">
					<?php
						foreach($related_news as $rows)
						{
                        echo "<p>".">>".anchor("articles/detail/{$rows['article_id']}",$rows['title'])."</p>";
						}
					?>
                    </div>
                </div>
                
                <div class="noidung">
                    <div class="menu">
                            <li><span class="mleft"></span>
                            <a href="#">Thông báo</a>
                            <span class="mright"></span>
                            </li>
                            <div class="thanhngang"></div>
                    </div>
                    <div class="tc_baiviet">
						<div class="tc_anh">
                        <?php
							if(empty($notice['thumbnail']))
							{
							$path = "no-image.jpg";
							}
							else
							{
							$path = $notice['thumbnail'];
							}
						?>
                        	<img src="<?php echo base_url(); ?>public/ckeditor/kcfinder/upload/.thumbs/images/<?php echo $path; ?>" width="120px" height="100px" border="1px solid red" />
						</div>
                        <div class="tc_tomtat">
							<?php
							echo anchor("articles/detail/{$notice['article_id']}",$notice['title'])."<br/><br/>";
							echo $notice['description']."<br/><br/>";
							?>
                        </div>
                        
                    </div>
                    <div class="tc_tinlq">
                       <?php
						foreach($related_notice as $rows)
						{
                         echo "<p>".">>".anchor("articles/detail/{$rows['article_id']}",$rows['title'])."</p>";
						}
					?>
                    </div>
                </div>
				
				<div class="noidung">
                    <div class="menu">
                            <li><span class="mleft"></span>
                            <a href="#">Sự kiện</a>
                            <span class="mright"></span>
                            </li>
                            <div class="thanhngang"></div>
                    </div>
                    <div class="tc_baiviet">
						<div class="tc_anh">
                        <?php
							if(empty($event['thumbnail']))
							{
							$path = "no-image.jpg";
							}
							else
							{
							$path = $event['thumbnail'];
							}
						?>
                        	<img src="<?php echo base_url(); ?>public/ckeditor/kcfinder/upload/.thumbs/images/<?php echo $path; ?>" width="120px" height="100px" border="1px solid red" />
						</div>
                        <div class="tc_tomtat">
							<?php
							echo anchor("articles/detail/{$event['article_id']}",$event['title'])."<br/><br/>";
							echo $event['description']."<br/><br/>";
							?>
                        </div>
                        
                    </div>
                    <div class="tc_tinlq">
                       <?php
						foreach($related_events as $rows)
						{
                         echo "<p>".">>".anchor("articles/detail/{$rows['article_id']}",$rows['title'])."</p>";
						}
					?>
                    </div>
        

   
            </div>
            <!--END NOI DUNG-->
   		
        </div>
    <!--END CONTENT-->
    
<?php
	$this->load->view("website/common/menu_right");
?>
	
  	
</div>    
<!--END MAIN-->
<?php
	$this->load->view("website/common/footer");
?>
