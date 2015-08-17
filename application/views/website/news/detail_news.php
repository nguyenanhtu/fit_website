 <?php
	$this->load->view("website/common/header");
?>

 
 <!--NOI DUNG-->
            <div class="cont">
                <div class="noidung">
                	<div class="nd_menu"><h2><?php echo $dat['title']; ?></h2></div>
                    <!--BAI VIET-->
                    	<div class="noidung_chitiet">
                        	<div class="ct_ngaydang">
                            	Ngày đăng: 
								<?php 
									$post_on = date("d-m-Y",strtotime($dat['date']));
									echo $post_on;
								?>
                            </div>
                          
                            <div class="ct_con">
                            	<?php
									echo $dat['content'];
								?>
                            </div>
                            
                            <div class="tt_tacgia">
								Đăng bởi: <?php echo "<b><i>".$dat['name']."</i></b>"; ?> 
								<?php
									
								?>
                            </div>
							
							<div class="attach-files">
								<?php
									
									if(!empty($list))
									{
									echo "<h4> Attachment Files </h4>";
									echo "<ul>";
									foreach($list as $l)
									{
										echo "<li>";
										echo anchor("articles/download/{$l['rid']}",$l['name']);
										echo "</li>";
									}
									echo "</ul>";
									}
								?>
							</div>
                            <div class="tt_tinlienquan">
                            	<div class="tlq_tieude">Tin liên quan</div>
                                <div class="tlq_tt">
                            	<?php
								foreach($dat2 as $rows)
								{
								echo "<p>";
								echo anchor("articles/detail/{$rows['article_id']}",$rows['title']);
								echo "</p>";
								}
								?>
                                </div>
                            </div>
                            
                        </div>
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