<?php
	$this->load->view("administrator/common/header");
?>

<div id="contentbox">
	<div id="toolbar-box">
		<div class="m">
			<div class="pagetitle icon-48-category-add icon-48-content-category-add">
				<h2>Articles Manager: Add A New Articles</h2>
				<!--
				Ở mục tài nguyên, ta sẽ tạo từng file down
				tương ứng với từng bài viết. Ví dụ 
				1. Toán rời rạc - Link down (Tạo hẳn một article Toán rời rạc)
				Kế đó ở phần tài nguyên không tạo bài viết nữa 
				mà chỉ show ra list các bài viết thuộc categories tài 
				nguyên (hơi mất công chút).
				-->
			</div>
		</div>
	</div>
	<div id="system-message-container">
		<?php
			if(!empty($ck) && !empty($msg))
			{
				echo "<dl id='system-message'>
						<dd class='message message'>
							<ul>
								<li>Đã tạo bài viết thành công</li>
							</ul>
						</dd>
					  </dl>
				
				";
			}
		?>
	</div>
	<div id="element-box">
		<div class="m">
			<?php
				echo validation_errors();
				$att = array("id" => "item-form", "class" => "form-validate", "name" => "adminForm");
				echo form_open_multipart("administrator/articles_admin/add",$att);
			?>
			<div class="width-60 fltlft" style="width:60%">
				<fieldset class="adminform">
					<legend>New Article</legend>
						<ul class="adminformlist">
							<li>
								<label id="jform_title-lbl" class="hasTip required invalid" title="" for="jform_title" aria-invalid="true">
									Title
								</label>
								<input id="jform_title" class="inputbox required invalid" type="text" size="40" name="title" />
							</li>
							<li>
								<label  class="hasTip required" title="" for="description">
									Description
								</label>
								<textarea name="description" style="width:100%"> </textarea>
							</li>
							<li>
								<label label id="jform_catid-lbl" class="hasTip required" title="" for="jform_catid" >
									Category
								</label>
								<select id="jform_catid" class="inputbox required" name="catid" aria-required="true" required="required">
									<?php
										foreach($prepare as $row)
										{
											$key = $row['cat_name'];
											$value = $row['cat_id'];
											/* Ở đây do mặc định mỗi lần dùng */
											echo "<option value='$value'>".$key."</option>";
										}
									?>
								</select>
							</li>
							<li>
								<label id="jform_state-lbl" class="hasTip" title="" for="jform_state">
									Status
								</label>
								<select select id="jform_state" class="inputbox" size="1" name="status" >
									<option value='1'> Published </option>
									<option value='0'> Unpublished </option>
								</select>
							</li>
						</ul>
						<div class="clr"></div>
							<label id="jform_articletext-lbl" class="hasTip" title="" for="jform_articletext">
								Article Text
							</label>
							<div class="clr"></div>
							 <textarea id="content" name="content" style="width:100%" class="ckeditor"></textarea>
						<div class="clr"></div>
				</fieldset>
			</div>
					<div class="width-40 fltrt">
						<div id="content-sliders-61" class="pane-sliders">
							<!--CÓ LẼ PHẢI BỎ PHẦN NÀY. TẠO MỘT PHẦN CREATE THUMBNAIL IMAGE RIÊNG
							<div class="panel">
								<h3 id="publishing-details" class="title pane-toggler-down"><a href="javascript:void(0);"><span>Thumbnail Image</span></a></h3>
									<input type="file" name="image" />
							</div>-->
							<div class="panel">
								<h3 id="publishing-details" class="title pane-toggler-down"><a href="javascript:void(0);"><span>Attachment Files</span></a></h3>
									<input type="file" name="files[]" multiple />
							</div>
							<div class="panel">
								<h3 id="publishing-details" class="title pane-toggler-down"><a href="javascript:void(0);"><span>Thumbnail Image</span></a></h3>
									<input type="input" name="image"  />
									<!--Trong thư mục upload của kcfinder có thư mục con .thumb tự
										động tạo ảnh thumbnail. Lúc show chỉ cần trỏ đến thư mục 
										này. Ko cần dùng thư viện CI nữa-->
							</div>
						</div>
					</div>
			<div class="width-100 fltlft" style="height:400px">
				<div id="permissions-sliders-" class="pane-sliders">
					<div class="panel" style="height:60px">
						<input type="submit" name="submit" value="Tạo bài viết" class="modal-button"style="height:60px"  />
						</form>
					</div>
				</div>
			</div>
	</div>
	
</div>