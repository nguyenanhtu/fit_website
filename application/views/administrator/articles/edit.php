<?php
	$this->load->view("administrator/common/header");
?>

<div id="content-box">
	<div id="toolbar-box">
		<div class="m">
			<div class="pagetitle icon-48-categories icon-48-content-categories">
				<h2>Articles Manager : Edit Articles</h2>
			</div>
		</div>
	</div>
	
	<div id="system-message-container">
		<?php
			if(!empty($msg) && !empty($ck))
			{
				if($ck=='success')
				{
				echo "<dl id='system-message'>
						<dd class='message message'>
							<ul>
								<li>$msg</li>
							</ul>
						</dd>
					  </dl>
				
				";
				}
				else if($ck=='failed')
				{
				echo "<dl id='system-message'>
						<dd class='error error'>
							<ul>
								<li>$msg</li>
							</ul>
						</dd>
					  </dl>
				
				";
				}
			}
		?>
	</div>
	
	<div id="element-box">
		<div class="m">
			<?php
				echo validation_errors();
				$att = array("id" => "item-form", "class" => "form-validate", "name" => "adminForm");
				echo form_open_multipart("administrator/articles_admin/edit/{$val['article_id']}",$att);
			?>
			<div class="width-60 fltlft" style="width:60%">
				<fieldset class="adminform">
					<legend>Details</legend>
						<ul class="adminformlist">
							<li>
								<label id="jform_title-lbl" class="hasTip required" title="" for="jform_title">
									Title
								</label>
								<input id="jform_title" class="inputbox required" type="text" size="30" name = "title" value="<?php echo set_value('title',$val['title']); ?>" />
							</li>
							<li>
								<label  class="hasTip required" title="" for="description">
									Description
								</label>
								<textarea name="description" style="width:100%"><?php echo set_value('description',$val['description']); ?> </textarea>
							</li>
							<li>
								<label title="" class="hasTip" for="jform_parent_id" id="jform_parent_id-lbl">
									 Category
								</label>
								<select id="jform_parent_id" class="inputbox" name="category">
									<?php
										foreach($prepare as $row)
										{
											$key = $row['cat_name'];
											$value = $row['cat_id'];
									?>
										<option value="<?php echo $value; echo set_select('category',$value); ?>" <?php if($value==$val['cat_id']){ echo "selected='selected'";} ?> ><?php echo $key; ?></option>
									<?php
										}
									?>
								</select>
							</li>
							<li>
							<label id="jform_state-lbl" class="hasTip" title="" for="jform_state">
									Status
								</label>
								<select id="jform_published" class="inputbox" size="1" name="status">
									<option value='1'> Published </option>
									<option value='0'> Unpublished </option>
								</select>
							</li>
						</ul>
						<div class="clr"></div>
						<label title="" class="hasTip" for="jform_articletext" id="jform_articletext-lbl">Article Text</label>
						<div class="clr"></div>
							 <textarea id="content" name="content" style="width:100%" class="ckeditor"><?php echo set_value('content',$val['content']);  ?> </textarea>
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
				
				<div class="width-100 fltlft" style="height:100px">
				<div id="permissions-sliders-" class="pane-sliders">
					<div class="panel" style="height:60px">
						<input type="submit" name="submit" value="Sửa đổi" class="modal-button"style="height:60px"  />
						</form>
					</div>
				</div>
			</div>
	</div>
	
</div>
	
</div>