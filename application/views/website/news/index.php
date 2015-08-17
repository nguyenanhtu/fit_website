<?php
	$this->load->view("website/common/header");
?>

            
            <div class="cont">
          	<!--NOI DUNG-->
                <div class="noidung">
                	<div class="nd_menu"><h2><?php echo $cat_title; ?></h2></div>
                    <!--BAI VIET-->
					<?php
										foreach($dat as $rows)
			
			{	
				if(empty($rows['thumbnail']))
				{
					$path = "no-image.jpg";
				}
				else
				{
					$path = $rows['thumbnail'];
				}
				?>
                    <div class="baiviet">
                    	<div class="img"><img src="<?php echo base_url(); ?>public/ckeditor/kcfinder/upload/.thumbs/images/<?php echo $path; ?>" width="100px" height="80px" /> </div>
                        <div class="tomtat">
                        	<div class="title"><?php 
								$post_on = date("d-m-Y",strtotime($rows['post_on']));
								$tt = $rows['title'].' - '.$post_on;
							echo anchor("articles/detail/{$rows['article_id']}",$tt); ?>
							</div>
                            <div class="des">
								<?php echo $rows['description'];  ?>
							</div>
                        </div>
                    </div>
				
				<?php
			}
				?>
                    
                    <!--BAI VIET-->
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