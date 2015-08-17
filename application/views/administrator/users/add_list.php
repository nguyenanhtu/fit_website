<?php
	$this->load->view("administrator/common/header");
?>

<div id="content-box">
	<div id="toolbar-box">
			<div class="m">
			<?php 
			echo validation_errors();
			$attributes = array('id' => 'adminForm', 'name' => 'adminForm');
			//echo form_open("administrator/categories_admin/");
			echo form_open_multipart("administrator/users_admin/do_upload",$attributes);
		?>
		<div class="pagetitle icon-48-article">
				<h2>Add list users</h2>
				</div>
			</div>
	</div>
	<div id="element-box">
		<div class="m">
			<div class="clr"> </div>
				<div class="panel">
								<h3 id="publishing-details" class="title pane-toggler-down"><a href="javascript:void(0);"><span>Add list users</span></a></h3>
									<input type="file" name="list"  />
									<!--Trong thư mục upload của kcfinder có thư mục con .thumb tự
										động tạo ảnh thumbnail. Lúc show chỉ cần trỏ đến thư mục 
										này. Ko cần dùng thư viện CI nữa-->
				</div>
				<input type="submit" name="submit" value="Add list" />
			</form>
		</div>
	</div>
</div>
<div id="footer">
		<p class="copyright">
		</p>
	</div>
</body>
</html>