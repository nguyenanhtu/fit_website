<?php
	$this->load->view('website/common/header');
?>

<div class="cont">
<div class="noidung">
                	<div class="nd_menu"><h2>Nghiên cứu - Lĩnh vực nghiên cứu</h2></div>
                    <!--BAI VIET-->
                    <?php
					  	foreach($dat as $row)
						{
						if(empty($row['thumbnail']))
						{
						$path = "no-image.jpg";
						}
						else
						{
						$path = $row['thumbnail'];
						}
					  ?>
                    <div class="baiviet">
                    	<div class="img"><img src="<?php echo base_url(); ?>public/ckeditor/kcfinder/upload/.thumbs/images/<?php echo $path; ?>" width="100px" height="80px" /> </div>
                        <div class="tomtat">
                        	<div class="title"><?php echo anchor("articles/detail/{$row['article_id']}",$row['title']); ?></div>
                            <div class="des"><?php echo $row['description'] ?></div>
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
	$this->load->view('website/common/menu_right');
?>  
</div>    
<!--END MAIN-->
<?php
	$this->load->view('website/common/footer');
?>
