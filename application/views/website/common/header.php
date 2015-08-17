<!doctype html>
<html>
<head>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor2/ckeditor.js">
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/style12.css"/>
<script src='<?php echo base_url(); ?>public/assets/js/jquery.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/menu2.css"/>
<script src='<?php echo base_url(); ?>public/assets/js/mootools.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>public/assets/js/menu_jquery.js'></script>
<title>Khoa Công Nghệ Thông Tin</title>
</head>

<body>
<!--MAIN-->
<div class="main">
    <!--HEADER-->
        <div class="head">
            <div class="headright">
            <div class="menutren">
                <a href="#">Sơ đồ web</a> | 
				<?php
					$user_le = $this->session->userdata('user_id');
					$user_le = $this->session->userdata('user_id');
					if(!empty($user_le))
					{
					$user_lev = $this->session->userdata('user_level');
					switch($user_lev)
					{
					case "Sinh viên" :
						echo "Xin chào"." ".$this->session->userdata('name')."|";
						echo anchor('account/show_acc_detail','User Profile')."|";
						//echo anchor('users/change_pass','Change Password')."|";
						echo anchor('users/log_out','Log Out')."|";
						echo anchor('users/send_article','Gửi bài viết')."|";
						echo anchor('users/show_articles','Các bài viết đã gửi')."|";
						break;
					case "Giảng viên" :
						echo "Xin chào"." ".$this->session->userdata('name')."|";
						echo anchor('account/show_acc_detail','User Profile')."|";
						echo anchor('users/change_pass','Change Password')."|";
						echo anchor('users/log_out','Log Out')."|";
						echo anchor('users/send_article','Gửi bài viết')."|";
						echo anchor('users/show_articles','Các bài viết đã gửi')."|";
						break;
					case "Admin" :
						echo "Xin chào"." ".$this->session->userdata('name')."|";
						echo anchor('users/profile','Admin Profile')."|";
						
						echo anchor('administrator/index','Trang Quản trị')."|";
						echo anchor('users/log_out','Log Out')."|";
						break;
					default :
						echo anchor('login','Đăng nhập');	
						break;
					}
					}
					else
					{
						echo anchor('login','Đăng nhập');	
					}
						
				?>
            </div>
            <div class="search">
            <?php
				echo form_open("search/search_keyword");
			?>
                <input type="search" name="keyword" placeholder="Tìm kiếm">
				
            </form>
            </div>
            </div>
        </div>
    <!--END HEADER-->
    
    <!--MENU NGANG-->
       <div id='cssmenu'>
        <ul>
           <li class='active'><a href='<?php echo base_url(); ?>'><span>Trang Chủ</span></a></li>
           <li class='has-sub'><a href='#'><span>Giới thiệu</span></a>
              <ul>
                 <li class='has-sub'><a href='#'><span>Tổng quan</span></a>
                    <ul>
                       <li><a href='<?php echo base_url(); ?>articles/soluoc'><span>Giới thiệu sơ lược</span></a></li>
                       <li class='last'><a href='<?php echo base_url(); ?>articles/history'><span>Lịch sử phát triển của Khoa</span></a></li>
                    </ul>
                 </li>
                 <li class='has-sub'><a href='#'><span>Cơ cấu tổ chức</span></a>
                    <ul>
                       <li><a href='#'><span>Ban Chủ nhiệm Khoa</span></a></li>
                       <li class='last'><a href='<?php echo base_url(); ?>users/list_teacher'><span>Danh sách cán bộ</span></a></li>
                    </ul>
                 </li>
              </ul>
           </li>
           <li class='has-sub'><a href='#'><span>Đào tạo</span></a>
                 <ul>
                    <li><a href="<?php echo base_url(); ?>articles/daihoc.html"><span>Đại học</span></a>
                    </li>
                    <li><a href='#'><span>Sau Đại học</span></a>
                    </li>
                    <li><a href='#'><span>Vừa học Vừa làm</span></a>
                    </li>
                 </ul>
           </li>
           <li class='has-sub'><a href='#'><span>Nghiên cứu</span></a>
                 <ul>
                    <li><a href='<?php echo base_url(); ?>articles/linhvucnghiencuu.html'><span>Lĩnh vực nghiên cứu</span></a>
                    </li>
                    <li><a href='#'><span>Đối tác nghiên cứu</span></a>
                    </li>
                    <li><a href='#'><span>Các dự án</span></a>
                    </li>
                    <li><a href='#'><span>Hội thảo - Seminar</span></a>
                    </li>
                 </ul>
           </li>
           <li class='has-sub'><a href='#'><span>Tin tức</span></a>
                 <ul>
                    <li><a href='<?php echo base_url(); ?>articles/notice.html'><span>Thông báo</span></a>
                    </li>
                    <li><a href='#'><span>Tin Giáo dục</span></a>
                    </li>
                    <li><a href='<?php echo base_url(); ?>articles/tech_news'><span>Tin Công nghệ</span></a>
                    </li>
                    <li><a href='<?php echo base_url(); ?>articles/duhoc'><span>Du học - Học bổng</span></a>
                    </li>
                    <li><a href='<?php echo base_url(); ?>articles/jobs.html'><span>Việc làm - Tuyển dụng</span></a>
                    </li>
                 </ul>
           </li>
           <li class='has-sub'><a href='#'><span>Tài nguyên</span></a>
				<ul>	
					<li><a href='<?php echo base_url(); ?>articles/tailieumonhoc.html'><span>Tài liệu môn học</span></a>
                    </li>
                    <li><a href='#'><span>Tin Giáo dục</span></a>
                    </li>
                    <li><a href='<?php echo base_url(); ?>articles/tech_news'><span>Tin Công nghệ</span></a>
                    </li>
				</ul>
		   </li>
           <li class='last'><a href='<?php echo base_url(); ?>articles/lienhe.html'><span>Liên hệ Khoa</span></a></li>
        </ul>
        </div>
    <!--END MENU NGANG-->
    
    <!--CONTENT-->
        <div class="content">
        	<!--SEARCH-->
        	<div class="timkiem">
            	<img src="<?php echo base_url(); ?>public/assets/images/daidien.jpg" alt="ảnh đại diện" width="100%" height="100%" />
            </div>
            <!--END SEARCH-->
            
            