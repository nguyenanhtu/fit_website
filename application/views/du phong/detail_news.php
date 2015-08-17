<?php
	$this->load->view("website/common/header");
?>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/style_004.css" media="screen">
<div class="col-md-9">
 <div class="news_detail_bound">
    <div class="namecate bg_mn5"><a href="index.html">Trang chủ</a> » <a href="tintuc.html">Tin tức</a> » Facebook sẽ tung tính năng quảng cáo video trong tuần này</div>
    
    <div class="news_detail_content bg_mn5">
        <div class="news_detail_title">
			<?php
				echo $dat['title'];
			?>
		</div>
    
	<?php 
		echo $dat['content'];
	?>
      <div>
         <div class="like-share"> 
                
              </div>
              <div style="background: #fff; margin-top:10px">
              
              </div>
      </div>
      <div class="news_other">
        <div class="news_other_title">Related Posts</div>
			 <div class="news_other_item">
				<ul>
			<?php
				foreach($dat2 as $rows)
				{
					echo "<li>";
					echo anchor("articles/detail/{$rows['article_id']}",$rows['title']);
					echo "</li>";
				}
			?>
				</ul>
			</div>
      </div>
    </div>
</div>      
    </div>

<?php
	$this->load->view("website/common/footer");
?>