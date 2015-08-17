<!DOCTYPE html>
<html >
<head>
<title>
	<?php
		if(!empty($title))
		{
			echo $title;
		}
		else
		{
			echo "Khoa CNTT - Đại học Sư phạm Hà Nội";
		}
	?>
</title>
<meta name="keywords" content="KHOA CÔNG NGHỆ THÔNG TIN">
<meta name="description" content="KHOA CÔNG NGHỆ THÔNG TIN">
<link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/website-images/FAV%20ICON.png">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/style_003.css" media="screen">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery.js"></script>

    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap.js"></script>
    <!--menu-->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/style_002.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/script.js"></script>
     <!--slide-->
      <script>
				  var $j = jQuery.noConflict()
			jQuery(function(){
				jQuery("#jcaroulsel").jCarouselLite({
					visible:3, /*số sp hiển thị*/
					scroll:1, /*số sp đc chạy*/
					auto: 17000, /* thời gian ngừng*/
					speed:1550, /*thời gian ảo điệu*/
					btnNext:'#nexthotel', /*Next sản phẩm*/
					btnPrev:'#previewhotel' /*Preview sản phẩm*/
				});
			})

		</script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-nivo.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/style.css" type="text/css" media="screen">
    <!--end slide-->
<body>

<div class="container">
	<?php
		if($this->session->userdata('name'))
		{
			echo "Xin chào".$this->session->userdata('name');
		}
		else
		{
			echo "Xin chào Guest";
		}
	?>
    <header id="header">
        <div class="banner">
            <img src="<?php echo base_url(); ?>public/assets/website-images/banner.jpg" />
            
        </div>
        <nav class="navbar-collapse collapse">
            <ul class="nav navbar-nav menu" id="menu">
                <li class="menu_first mn_item1">
                    <a href="">
                        <span> </span>
                        Trang chủ
                    </a> 
                </li>
                                <li class="mn_item2"><a class=" " href="#"><span>Giới thiệu</span></a>
                    <ul style="overflow: hidden; display: block; height: 0px; z-index: 53; opacity: 0.0125;">
                                            <li><a href="#">Tổng quan</a></li>
                                            <li><a href="#">Cơ cấu tổ chức</a></li>
                                            <li><a href="#">Sinh viên tiêu biểu</a></li>
                                            </ul>
                </li>
                                <li class="mn_item3"><a class="  " href="#"><span>Đào Tạo</span></a>
                    <ul style="overflow: hidden; display: block; height: 0px;">
                    							<li><a href="#">Chính qui</a></li>
                                                <li><a href="#">Sau Đại học</a></li>
                                                <li><a href="#">Tại chức- Từ xa</a></li>
                                        </ul>
                </li>
                                <li class="mn_item4"><a class="   " href="#"><span>Nghiên cứu</span></a>
                   	 <ul style="overflow: hidden; display: block; height: 0px;">
                                        </ul>
                </li>
                <li class="mn_item7"><a class=" " href="tintuc.html"><span>Tin tức</span></a>
                    <ul style="overflow: hidden; display: block; height: 0px; z-index: 55; opacity: 0.00625;">
                                            	<li><a href="#">TIN CÔNG NGHỆ</a></li>
                                                <li><a href="#">TIN TỨC -SỰ KIỆN</a></li>
                                                <li><a href="#">TIN XÃ HỘI</a></li>
                                                <li><a href="#">NGƯỜI NỔI TIẾNG</a></li>
                                            </ul>
                </li>
                             
                                <li class="mn_item6"><a class="  " href="#"><span>Diễn đàn</span></a>
                    
                </li>
                                   
                <li class="mn_item5"><a href="#"><span> </span>TÀI LIỆU</a>
                    <ul>
                                            <li><a href="#">Tài liệu môn học</a></li>
                                            <li><a href="#">Thư viện ảnh</a></li>
                                            <li><a href="#">Phần mềm tiện ích</a></li>
                                            <li><a href="#">Công văn</a></li>     
                    </ul>
                </li>
				 <li class="mn_item5"><a href="<?php echo base_url(); ?>users/list_users.html"><span> </span>DANH SÁCH USERS</a>
				 </li>
               
            </ul>
            <script type="text/javascript">
			var menu=new menu.dd("menu");
			menu.init("menu","menuhover");
			</script> 
        </nav>
</header>   
        