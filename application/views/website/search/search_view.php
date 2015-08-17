<?php
	$this->load->view("website/common/header");
?>

<?php
	$this->load->view("website/common/left-sidebar");
?>

<!--NOI DUNG-->
            <div class="cont">
          
                <div class="noidung">
			    <!--BAI VIET-->
					<div class="nd_menu"><h2> Kết quả tìm kiếm</h2></div>
					<?php
						foreach($result as $rows)
						{
					?>
						 <div class="baiviet" style="width:800px;margin-top:40px;">
							 <div class="tomtat" style="width:600px;">
								<div class="title" style="width:800px;">
								<?php 
								$post_on = date("d-m-Y",strtotime($rows['post_on']));
								$tt = $rows['title'].' - '.$post_on;
								echo anchor("articles/detail/{$rows['article_id']}",$tt); ?>
								</div>
								<div class="des">
								<?php
								//Do có một số từ khóa đôi khi xuất hiện ở phần sau khi
								//đã cắt bớt nội dung bài nên sẽ không xuất hiện ở kết quả
								//Tuy vậy kết quả search vẫn đúng, ko sai lệch.
									$ct = strip_tags($rows['content']);
									$count = str_word_count($ct);
									if($count > 52)
									{
									$ct2 = stristr($ct,$key);
									$ct3 = "...".word_limiter($ct2,52);
									}
									else
									{
									$ct3 = $ct;
									/*
										Hàm search này không hiển thị được highlight
										đối với chữ tiếng Việt (nhưng vẫn ra kết quả search
										đúng
									*/
									/*Nếu như độ dài bài viết nhỏ hơn 52 
									thì có thể hiển thị cả bài viết, do 
									đó mà từ khóa cần tìm chắc chắn sẽ được bôi
									đậm trong bài, ko cần cắt bài nữa.
									*/
									}
								//echo $rows['description'];
									echo highlight_phrase($ct3, $key, '<span style="color:#990000">', '</span>');
									
								?>
								</div>
							 </div>
						 </div>
						 <?php
						}
						 ?>
				</div>
            </div>
            <!--END NOI DUNG-->
            
        </div>
    <!--END CONTENT-->
    
</div>    
<!--END MAIN-->

<?php
	$this->load->view("website/common/footer");
?>