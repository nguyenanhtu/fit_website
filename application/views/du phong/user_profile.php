<?php
	$this->load->view("website/account/common/header");
?>	
	<div class="main">
    	<div class="ac_thongtin">
        	<div class="anh">
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
            	<img style="padding-left:50px; padding-top:50px" src="<?php echo base_url(); ?>public/assets/images/<?php echo $path; ?>" alt="Ảnh đại diện" width="200px" height="200px"/>
            </div>
            <div class="ttchitiet">
            	<ul>
                	<li>Họ và Tên: <?php echo $user['name'];  ?></li>
                    <li>Ngày Sinh: 8/8/1992</li>
                    <li>Chức vụ: <?php echo $user['user_level']; ?></li>
                    <li>Đơn vị: <?php echo $user['department'] ?></li>
                    <li>Email: <?php echo $user['email'] ?></li>
                    <li>Trang cá nhân: 
						<?php 
						if(empty($web['link']))
						{
							echo "Thông tin này chưa được cập nhật";
						}
						else
						{
							echo $web['link'];
						}
					?>
					</li>
                </ul>
            </div>
        	<div class="chinhsua">
            	<a href="#">Đổi avatar</a>| <a href="#">Sửa thông tin</a>| <a href="#">Tải tài liệu</a>
            </div>
        </div>
        <div class="ac_content">
        	<div class="tabbed">
              <ul class="tabnav">
                <li><a href="#tab1">Về tôi</a></li>
                <li><a href="#tab2">Tin đã gửi</a></li>
                <li><a href="#tab3">Tin đã nhận</a></li>
                <li><a href="#tab4">Tài liệu</a></li>
              </ul>
              <div class="tabcont">
                <div id="tab1" class="tabcontent">Nội dung tab 1 Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1 Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1 Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1Nội dung tab 1 </div>
                <div id="tab2" class="tabcontent">
				<?php
				if(!empty($sent_mess))
				{
					foreach($sent_mess as $row)
		{
            echo "<table border=1>";
			echo "<tr><td>";
			echo "Message ID#: ";
			echo $row['mid'];
			echo "</td></tr>";
			echo "<tr><td>";
			echo "To: ";
			echo $row['to_user'];
			echo "</td></tr>";
			echo "<tr><td>";
			echo "From: ";
			echo $row['from_user'];//Có thể cải tiến lấy ra tên của user
			//thay vì id không
			echo "</td></tr>";
			echo "<tr><td>";
			echo "Message: ";
			echo $row['message'];
			echo "</td></tr>";
			echo "</br>";
		}
		}
		else
		{
			echo "Hiện chưa có tin nhắn nào";
		}
				?>
				</div>
                <div id="tab3" class="tabcontent">
					<?php
					if(!empty($received_mess))
					{
		foreach($received_mess as $row2)
		{
            echo "<table border=1>";
			echo "<tr><td>";
			echo "Message ID#: ";
			echo $row2['mid'];
			echo "</td></tr>";
			echo "<tr><td>";
			echo "To: ";
			echo $row2['to_user'];
			echo "</td></tr>";
			echo "<tr><td>";
			echo "From: ";
			echo $row2['from_user'];
			echo "</td></tr>";
			echo "<tr><td>";
			echo "Message: ";
			echo $row2['message'];
			echo "</td></tr>";
			echo "</br>";
		}
		}
		else
		{
			echo "Hiện chưa có tin nhắn nào";
		}
		?>
				</div>
                <div id="tab4" class="tabcontent">Nội dung tab 4</div>
              </div>
            </div>
        </div>
    </div><!--ENN MAIN-->

<?php
	$this->load->view("website/account/common/footer");
?>	