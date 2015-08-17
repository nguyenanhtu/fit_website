<?php
	$this->load->view("administrator/common/header");
?>

<?php 
echo validation_errors();
echo form_open('administrator/user_admin/adduser')?>
<body id="minwidth-body">
	<div id="content-box">
		<div id="toolbar-box">
			<div class="m">
			  <div class="pagetitle icon-48-user-add">
		      <h2>Thêm mới User</h2></div>
			</div>
		</div>
				
		<div id="element-box">
			<div class="m">

	<div class="width-60 fltlft">
    	<fieldset class="adminform" aria-invalid="false">
        <ul class="adminform">
			<li><label id="jform_name-lbl" for="jform_name" class="hasTip required" aria-invalid="false">
            	UserName
                <span class="star">&nbsp;*</span>
                </label>
                <input name="user_name" type="text" class="inputbox required" id="jform_name" value size="70" aria-required="true" aria-invalid="false"/> <br />
            </li>
            <li><label id="jform_name-lbl" for="jform_name" class="hasTip required" aria-invalid="false">
            	Họ và Tên
                <span class="star">&nbsp;*</span>
                </label>
                <input name="name" type="text" class="inputbox required" id="jform_name" value size="70" aria-required="true" aria-invalid="false"/> <br />
            </li>
            <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                Password
                <span class="star">&nbsp;*</span>
                </label><input name="password" type="password" class="inputbox required" id="jform_password" value size="70" aria-invalid="false"	 /> <br />
            </li>
            <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                Birthday 
                <span class="star">&nbsp;*</span>  </label>
                
				<?php 
					echo '<select name="slngay" id="slngay" >';
					echo '<option value="">Ngày</option>';
					for($i=1; $i<32; $i++)
					{
						echo "<option value=$i>$i</option>";
					}
					
					echo'</select>';
					echo '<select name="slthang" id="slthang" >';
					echo '<option value="">Tháng</option>';
					for($i=1; $i<13; $i++)
					{
						echo "<option value=$i>$i</option>";
					}
					
					echo'</select>';
					
					echo '<select name="slnam" id="slnam" >';
					echo '<option value="">Năm</option>';
					for($i=1913; $i<2014; $i++)
					{
						echo "<option value=$i>$i</option>";
					}
					
					echo'</select>';
					if(!empty($error))
					{
							echo $error;
					}

	?>
               
                <!-- <input type="text" name="birthday" id="jform_password" value class="inputbox required" aria-invalid="false"	 /> <br />-->
            </li>
            <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                Email
                <span class="star">&nbsp;*</span>
                </label><input type="email" name="email" id="jform_password" size="70" value class="inputbox required" aria-invalid="false"	 /> <br />
            </li>
            
          <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                User Level
                <span class="star">&nbsp;*</span>
                </label><select name="user_level">
                			<option value="Sinh viên">Sinh viên</option>
                            <option value="Giảng viên">Giảng viên</option>
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
     
        <li><label id="jform_name-lbl"> <input type="submit" name="add" value="Add"/></label></li>
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