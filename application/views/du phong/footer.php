  </div>
  <footer>
        <div class="col-md-12">
    <div class="footer_content">
        <div class="fooer_column1">
            <p class="com_name">KHOA CÔNG NGHỆ THÔNG TIN- TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI</p>
            <p>Địa chỉ: Nhà C, Trường Đại học Sư phạm Hà Nội, 136 Xuân Thủy - Cầu Giấy - Hà Nội</p>
            <p>Email: fit@hnue.edu.vn</p>
            <p>Hotline: (043).000000000 - 01234.567.890</p>
        </div>
        <div class="footer_column2">
            <!--<div class="footer_social">
                <a href="" class="social"><img src="images/facebook.png"></a>
                <a href="" class="social"><img src="images/youtube.png"></a>
                <a href="" class="social"><img src="images/yahoo.png"></a>
                <a href="" class="social"><img src="images/twiter.png"></a>
            </div>-->
			<?php
				$user_le = $this->session->userdata('user_id');
    if(!empty($user_le))
    {
        $user_lev = $this->session->userdata('user_level');
        //echo $user_lev."pom";
        switch($user_lev)
        {
            case "Sinh viên" :
                echo "<li>".anchor('users/profile','User Profile')."</li>";
                echo "<li>".anchor('users/change_pass','Change Password')."</li>";
                echo "<li>".anchor('users/mess','Messages')."</li>";
                echo "<li>".anchor('users/log_out','Log Out')."</li>";
                break;
            
            case "Admin" :
                echo "<li>".anchor('users/profile','Admin Profile')."</li>";
                echo "<li>".anchor('users/change_pass','Change Password')."</li>";
                echo "<li>".anchor('users/mess','Messages')."</li>";
                echo "<li>".anchor('administrator/index','Admin CP')."</li>";
                echo "<li>".anchor('users/log_out','Log Out')."</li>";
                break;
                
            default :
                echo "<li>".anchor('index','Home')."</li>";
                echo "<li>".anchor('register','Register')."</li>";
                echo "<li>".anchor('login','Login')."</li>";
                break;   
        }
    }
	else
    {
    
        echo  "<li>".anchor('home','Home')."</li>";
        echo  "<li>".anchor('register','Register')."</li>";
        echo  "<li>".anchor('login','Login')."</li>";
    }
				//echo anchor("login","Login");
			?>
        </div>
        <div class="footer_copyright">
            <div class="footer_logo"><img src="images/logo2.png">
                <span>© Copyright 2014 Huan Le Ngoc</span>
            </div>
            <div class="footer_copyright_title"></div>
        </div>
    </div>
</div>    </footer>
    <!--end footer-->
</div>

	<script type="text/javascript">
$(window).load(function(){autoScroller('vmarquee2', 1)});
</script>
</body></html>