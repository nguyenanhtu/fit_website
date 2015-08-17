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
			echo form_open("administrator/thumbnail_admin/do_upload");
		?>
				<div id="toolbar" class="toolbar-list">
					
				<div class="clr"></div>
				</div>
				<div class="pagetitle icon-48-article">
				<h2>Create Thumbnail</h2>
				</div>
			</div>
	</div>