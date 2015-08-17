
 <?php
	$this->load->view("website/common/header");
 ?>
<div class="noidung">
                	<div class="nd_menu"><h2><a href="">Bộ môn Công nghệ phần mềm</a></h2></div>
					<?php
						if($affrow > 0)
						{
						foreach ($dat as $rows)
						{
						if($rows['department'] == "Bộ môn Công nghệ phần mềm")
						{
						if(empty($rows['avatar']))
						{
						$path = "no_avatar.jpg";
						}
						else
						{
						$path = $rows['avatar'];
						}
						
					?>
                        <div class="cc_thongtin">
                    		
                            <div class="cc_ttchitiet">
                            	<ul>
                                    <li><?php echo $rows['name']; ?></li>
                                    <li>Email: <?php echo $rows['email']; ?></li>
                                    <li>Chức vụ : <?php echo $rows['user_level']; ?></li>
									<li> Trang cá nhân : <a href="<?php echo base_url(); ?>public/<?php echo $rows['link']; ?>/index.php"> Link </a> </li>
                                </ul>
                            </div>
                            <div class="cc_anh"><img src="<?php echo base_url(); ?>public/assets/images/<?php echo $path; ?>" alt="Cô Hồ Cẩm HÀ" width="120px" height="120px" /></div>
                      	</div>
                        <div class="cc_title"></div>
					<?php
						}
						}
						}
						else
						{
							echo "<p>Hiện chưa có danh sách giảng viên ở bộ môn này</p>";
						}
					?>
					
					<div class="nd_menu"><h2><a href="">Bộ môn Hệ thống thông tin</a></h2></div>
					<?php
						if($affrow > 0)
						{
						foreach ($dat as $rows)
						{
						if($rows['department'] == "Bộ môn Hệ thống thông tin")
						{
						if(empty($rows['avatar']))
						{
						$path = "no_avatar.jpg";
						}
						else
						{
						$path = $rows['avatar'];
						}
						
					?>
                        <div class="cc_thongtin">
                    		
                            <div class="cc_ttchitiet">
                            	<ul>
                                    <li><?php echo $rows['name']; ?></li>
                                    <li>Email: <?php echo $rows['email']; ?></li>
                                    <li>Chức vụ : <?php echo $rows['user_level']; ?></li>
									<li> Trang cá nhân : <a href="<?php echo base_url(); ?>public/<?php echo $rows['link']; ?>/index.html"> Link </a> </li>                                </ul>
                            </div>
                            <div class="cc_anh"><img src="<?php echo base_url(); ?>public/assets/images/<?php echo $path; ?>" alt="Cô Hồ Cẩm HÀ" width="120px" height="120px" /></div>
                      	</div>
                        <div class="cc_title"></div>
					<?php
						}
						}
						}
						else
						{
							echo "<p>Hiện chưa có danh sách giảng viên ở bộ môn này</p>";
						}
					?>
						
                        
                        
                </div>

<?php
	$this->load->view("website/common/footer");
 ?>