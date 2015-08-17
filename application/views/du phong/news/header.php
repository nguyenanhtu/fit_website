<!doctype html>
<html>
<head>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor2/ckeditor.js">
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/style10.css"/>
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