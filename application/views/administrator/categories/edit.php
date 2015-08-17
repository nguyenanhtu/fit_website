<?php
	$this->load->view("administrator/common/header");
?>

<div id="content-box">
	<div id="toolbar-box">
		<div class="m">
			<div class="pagetitle icon-48-categories icon-48-content-categories">
				<h2>Category Manager : Edit Categories</h2>
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
				//echo validation_errors();
				$att = array("id" => "item-form", "class" => "form-validate", "name" => "adminForm");
				echo form_open("administrator/categories_admin/edit/{$val['cat_id']}",$att);
			?>
			<div class="width-60 fltlft">
				<fieldset class="adminform">
					<legend>Details</legend>
						<ul class="adminformlist">
							<li>
								<label id="jform_title-lbl" class="hasTip required invalid" title="" for="jform_title" aria-invalid="true">
									Title
								</label>
								<input id="jform_title" class="inputbox required invalid" type="text" size="40" name="title" value="<?php echo set_value('cat_name',$val['cat_name']); ?>" />
							</li>
							<li>
								<label title="" class="hasTip" for="jform_parent_id" id="jform_parent_id-lbl">
									Parent Category
								</label>
								<select id="jform_parent_id" class="inputbox" name="parent">
									<option value='1'>No parents</option>
									<?php
										foreach($prepare as $row)
										{
											$key = $row['cat_name'];
											$value = $row['cat_id'];
									?>
										<option value="<?php echo $value; echo set_select('parent',$value); ?>" <?php if($value==$val['parent_id']){ echo "selected='selected'";} ?> ><?php echo $key; ?></option>
									<?php
										}
									?>
								</select>
							</li>
							<li>
								<label title="" class="hasTip" for="jform_published" id="jform_published-lbl">
									Status
								</label>
								<select id="jform_published" class="inputbox" size="1" name="status">
									<option value='1'> Published </option>
									<option value='0'> Unpublished </option>
								</select>
							</li>
						</ul>
						<div class="clr"></div>
							<label title="" class="hasTip" for="jform_description" id="jform_description-lbl">
								Description
							</label>
							<div class="clr"></div>
							 <textarea id="content" name="content" style="width:100%" class="ckeditor"><?php echo set_value('content',$val['description']);  ?> </textarea>
				</fieldset>
				
			</div>
			<div class="clr"></div>
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