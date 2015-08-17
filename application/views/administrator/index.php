<?php
	$this->load->view("administrator/common/header");
?>

<?php
	if($this->session->userdata('user_name'))
	{
		echo $this->session->userdata('user_name');
	}
?>
	<div id="content-box">
		
		<div id="element-box">
			<div class="m">
				<div class="adminform">
					<div class="cpanel-left">
						<div class="cpanel">
							<div class="icon-wrapper">
								<div class="icon">
								<a href="<?php echo base_url(); ?>administrator/articles_admin/index">
									<img src="<?php echo base_url(); ?>/public/assets/images/header/icon-48-article.png" />
										<span> Quản lý Bài viết </span>
								</a>
								</div>
							</div>
							<div class="icon-wrapper">
								<div class="icon">
								<a href="<?php echo base_url(); ?>administrator/categories_admin/index">
									<img src="<?php echo base_url(); ?>/public/assets/images/header/icon-48-category.png" />
										<span> Quản lý Danh mục  </span>
								</a>
								</div>
							</div>
							<div class="icon-wrapper">
								<div class="icon">
								<a href="<?php echo base_url(); ?>administrator/user_admin/index">
									<img src="<?php echo base_url(); ?>/public/assets/images/header/icon-48-user.png" />
										<span> Quản lý Users </span>
								</a>
								</div>
							</div>
							<div class="icon-wrapper">
								<div class="icon">
								<a href="<?php echo base_url(); ?>administrator/file_admin/index">
									<img src="<?php echo base_url(); ?>/public/assets/images/header/icon-48-media.png" />
										<span> Quản lý File tài nguyên </span>
								</a>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="clr"></div>
			</div>
		</div>
	</div>
	<div id="footer">
		<p class="copyright">
		</p>
	</div>
</body>
</html>
