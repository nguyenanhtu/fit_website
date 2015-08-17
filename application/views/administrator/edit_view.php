<?php
	$this->load->view("administrator/common/header");
?>
<body id="minwidth-body">
	<div id="content-box">
	  <div id="toolbar-box">
			<div class="m">
			  <div class="pagetitle icon-48-user-add">
			    <h2>Sửa User</h2></div>
			</div>
		</div>
				
		<div id="element-box">
			<div class="m">
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'user.cancel' || document.formvalidator.isValid(document.id('user-form'))) {
			Joomla.submitform(task, document.getElementById('user-form'));
		}
	}
</script>

<?php
	if(!empty($mess))
	{
		echo $mess;
	}
?>
<?php
	$att = array("id" => "item-form", "class" => "form-validate", "name" => "adminForm");
	echo form_open_multipart("administrator/user_admin/edituser/{$result['user_id']}",$att);
?>
	<div class="width-60 fltlft">
    	<fieldset class="adminform" aria-invalid="false">
        <ul class="adminform">
			<li><label id="jform_name-lbl" for="jform_name" class="hasTip required" aria-invalid="false">
            	UserName
                <span class="star">&nbsp;*</span>
                </label>
                <input name="user_name" type="text" class="inputbox required" id="jform_name" value="<?php echo $result['user_name'] ?>" size="70" aria-required="true" aria-invalid="false"/> <br />
            </li>
            <li><label id="jform_name-lbl" for="jform_name" class="hasTip required" aria-invalid="false">
            	Họ và Tên
                <span class="star">&nbsp;*</span>
                </label>
                <input name="name" type="text" class="inputbox required" id="jform_name" value="<?php echo $result['name'] ?>"  size="70" aria-required="true" aria-invalid="false"/> <br />
            </li>
            
            <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                Birthday 
                <span class="star">&nbsp;*</span>  </label>
                <input name="birthday" type="text" class="inputbox required" id="jform_name" value="<?php echo $result['birthday'] ?>" size="70" aria-required="true" aria-invalid="false"/> <br />
				
            </li>
            <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                Email
                <span class="star">&nbsp;*</span>
                </label><input type="email" name="email" id="jform_password" size="70" value="<?php echo $result['email'] ?>" class="inputbox required" aria-invalid="false"	 /> <br />
            </li>
            
          <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                User Level
                <span class="star">&nbsp;*</span>
                </label><select name="user_level">
                			<option value="Sinh viên" <?php
								if($result['user_level']=="Sinh viên")
								{
										echo "selected='selected'";
								}

							 ?> >Sinh viên</option>
                            <option value="Giảng viên" <?php
								if($result['user_level']=="Giảng viên")
								{
										echo "selected='selected'";
								}

							 ?>>Giảng viên</option>
                        </select><br />
            </li>
            <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                Trạng Thái
                <span class="star">&nbsp;*</span>
                </label><select name="status">
                			<option value="Activated">Activated</option>
                            <option value="Banned">Banned</option>
                        </select><br />
            </li>
          <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                Department
                <span class="star">&nbsp;*</span>
                </label><select name="department">
                			<option value="K60B">K60B</option>
                            <option value="K60C">K60C</option>
                            <option value="Bộ môn Công nghệ phần mềm">Bộ môn Công nghệ phần mềm</option>
                            <option value="Bộ môn Hệ thống thông tin">Bộ môn Hệ thống thông tin</option>
                            <option value="Bộ môn Khoa học máy tính">Bộ môn Khoa học máy tính</option>
                            <option value="Bộ môn Phương pháp giảng dạy">Bộ môn Phương pháp giảng dạy</option>
                            <option value="Bộ môn Kỹ thuật máy tính và mạng">Bộ môn Kỹ thuật máy tính và mạng</option>
                            
                		</select> <br />
            </li>
            
             <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                Add link
                <span class="star">&nbsp;*</span>
                </label><input name="link" type="" class="inputbox required" id="" value size="70" aria-invalid="false"	 /> <br />
            </li>
     
        <li><label id="jform_name-lbl"> <input type="submit" name="edit" value="Edit"/></label></li>
        </ul>
        </fieldset>
	</div>
</form>

			</div>
		</div>
		<noscript></noscript>
	</div>

	<p align="center">&nbsp;</p>
</body></html>