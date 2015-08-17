<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/style07.css"/>
<script src='<?php echo base_url(); ?>public/assets/js/jquery.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>public/assets/js/menu_jquery.js'></script>
<title>Khoa Công Nghệ Thông Tin</title>
</head>

<body>
<!--MAIN-->
<div class="main">
    <!--HEADER-->
        <div class="head">
            <img src="<?php echo base_url(); ?>public/assets/images/banner.jpg" alt="Khoa công nghệ thông tin"/>
        </div>
		<ul>
			<li>
				<?php echo anchor("login","Đăng nhập"); ?>
			</li>
			<li>
				<?php echo anchor("map_view","Sơ đồ web"); ?>
			</li>
		</ul>
    <!--END HEADER-->
    
    <!--MENU NGANG-->
       <div id='cssmenu'>
        <ul>
           <li class='active'><a href='index.html'><span>Trang Chủ</span></a></li>
           <li class='has-sub'><a href='#'><span>Giới thiệu</span></a>
              <ul>
                 <li class='has-sub'><a href='#'><span>Tổng quan</span></a>
                    <ul>
                       <li><a href='#'><span>Giới thiệu sơ lược</span></a></li>
                       <li class='last'><a href='#'><span>Lịch sử phát triển của Khoa</span></a></li>
                    </ul>
                 </li>
                 <li class='has-sub'><a href='#'><span>Cơ cấu tổ chức</span></a>
                    <ul>
                       <li><a href='#'><span>Ban Chủ nhiệm Khoa</span></a></li>
                       <li class='last'><a href='#'><span>Các tổ bộ môn</span></a></li>
                    </ul>
                 </li>
              </ul>
           </li>
           <li class='has-sub'><a href='#'><span>Đào tạo</span></a>
                 <ul>
                    <li><a href='#'><span>Đại học</span></a>
                    </li>
                    <li><a href='#'><span>Sau Đại học</span></a>
                    </li>
                    <li><a href='#'><span>Vừa học Vừa làm</span></a>
                    </li>
                 </ul>
           </li>
           <li class='has-sub'><a href='#'><span>Nghiên cứu</span></a>
                 <ul>
                    <li><a href='#'><span>Lĩnh vực nghiên cứu</span></a>
                    </li>
                    <li><a href='#'><span>Đối tác nghiên cứu</span></a>
                    </li>
                    <li><a href='#'><span>Các dự án</span></a>
                    </li>
                    <li><a href='#'><span>Hội thảo - Seminar</span></a>
                    </li>
                 </ul>
           </li>
           <li class='has-sub'><a href='#'><span>Tin tức - Sự kiện</span></a>
                 <ul>
                    <li><a href='#'><span>Thông báo</span></a>
                    </li>
                    <li><a href='#'><span>Tin Giáo dục</span></a>
                    </li>
                    <li><a href='#'><span>Tin Công nghệ</span></a>
                    </li>
                    <li><a href='#'><span>Du học - Học bổng</span></a>
                    </li>
                    <li><a href='#'><span>Việc làm - Tuyển dụng</span></a>
                    </li>
                 </ul>
           </li>
           <li><a href='#'><span>Diễn đàn</span></a></li>
           <li class='last'><a href='#'><span>Liên hệ</span></a></li>
        </ul>
        </div>
    <!--END MENU NGANG-->
    
    <!--CONTENT-->
		<div class="content">
        	<!--SEARCH-->
        	<div class="timkiem">
            </div>
            <!--END SEARCH-->
            
            <!--NOI DUNG-->
            <div class="cont">
               <?php
					$this->load->view("website/common/left-sidebar");
			   ?>
                <div class="noidung">
                	<div class="nd_menu"><h2>Tin tức mới</h2></div>
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
							echo anchor("news/detail/{$rows['article_id']}",$tt); ?>
							</div>
                            <div class="des">
								<?php echo "<p>".substr($rows['content'],0,strrpos($rows['content'],' '))."..."."</p>";  ?>
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
    
</div>    
<!--END MAIN-->

<div class="footer_content">
        <div class="footer_column1">
            <p class="com_name">FIT - HNUE</p>
            <p>Email: fit@hnue.edu.vn</p>
            <p>Hotline: (043).000000000 - 01234.567.890</p>
        </div>
        <div class="footer_column2">
            <div class="footer_social">
                <a href="" class="social"><img src="images/facebook.png"></a>
                <a href="" class="social"><img src="images/youtube.png"></a>
                <a href="" class="social"><img src="images/yahoo.png"></a>
                <a href="" class="social"><img src="images/twiter.png"></a>
            </div>
        </div>
        <div class="footer_copyright">
            <div class="footer_logo"><!--<img src="images/logo2.png">-->
                <span>© Copyright 2014 Huan Le Ngoc</span>
            </div>
            <div class="footer_copyright_title"></div>
        </div>
    </div>  
	
   <!--END FOOTER-->
</body>
</html>