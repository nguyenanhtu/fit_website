<?php
	$this->load->view("website/common/header");
?>	
    
            <!--NOI DUNG-->
            <div class="cont">
                	<div class="nd_menu1">
                    <h2><a href="">TRANG ACCOUNT</a></h2></div>
                    <div class="acc">
                    	<div class="acc_anh">
							<?php
						if(empty($user['avatar']))
						{
						$path = "no_avatar.jpg";
						}
						else
						{
						$path = $user['avatar'];
						}
						?>
                        	<img src="<?php echo base_url(); ?>public/assets/images/<?php echo $path; ?>" width="120px" height="120px" alt="Ảnh đại diện"/>
                        </div>
                        <div class="acc_thongtin">
                        	<ul>
                            	<li>Họ tên: <?php echo $user['name'];  ?></li>
                                <li>Chức vụ: <?php echo $user['user_level']; ?>   </li>
                                <li>Đơn vị: <?php echo $user['department'] ?> </li>
                                <li>Email: <?php echo $user['email'] ?> </li>
                        	</ul>
                        </div>
                        <div class="acc_edit">
                        	<a href="#">Sửa thông tin</a>||<a href="#">Đổi mật khấu</a>||<a href="#">Đăng xuất</a>
                        </div>
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