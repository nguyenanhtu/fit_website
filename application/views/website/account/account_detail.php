<?php
	$this->load->view("website/common/header");
?>
<?php echo form_open_multipart("account/show_acc_detail");?>
<div class="nd_menu1">
                    <h2><a href="">TRANG CÁ NHÂN</a></h2></div>
                    <div class="acc">
                    	<div class="acc_anh">
                        	<img src="<?php echo base_url(); ?>public/upload/image/<?php if(!empty($dat['avatar'])) echo $dat['avatar'];?>" width="120px" height="120px" alt="Ảnh đại diện"/>
							<input type="file" name="avatar" />
							<input type="submit" name="Upload" />
						</div>
                        <div class="acc_thongtin">
                        	<ul>
                            	<li><?php echo $dat['name'];?></li>
                                <li>Ngày sinh: <?php echo $dat['birthday'];?></li>
                                <li>Đơn vị: <?php echo $dat['department'];?></li>
                                <li>Email: <?php echo $dat['email'];?></li>
                        	</ul>
                        </div>
                        <div class="acc_edit">
                        	|<?php echo anchor("account/edit_acc","Edit");?>|<?php echo anchor("site/account/upload_form","Tải tài liệu");?>
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