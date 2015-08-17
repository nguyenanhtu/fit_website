<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	if(!empty($mess))
	{
		echo $mess;
	}
?>
<?php echo form_open("account/edit_acc")?>
	<div class="width-60 fltlft">
    	<fieldset class="adminform" aria-invalid="false">
        <ul class="adminform">
			<li><label id="jform_name-lbl" for="jform_name" class="hasTip required" aria-invalid="false">
            	Họ và Tên
                <span class="star">&nbsp;*</span>
                </label>
                <input type="text" name="name" id="jform_name" value="<?php echo $dat['name']; ?>" class="inputbox required" aria-required="true" aria-invalid="false"/> <br />
            </li>
			<li><label id="jform_name-lbl" for="jform_name" class="hasTip required" aria-invalid="false">
            	Password
                <span class="star">&nbsp;*</span>
                </label>
                <input type="password" name="pass" id="jform_name"  class="inputbox required" aria-required="true" aria-invalid="false"/> <br />
            </li>
            <li>
                <label id="jform_password-lbl" for="jform_password" class="hasTip required" aria-invalid="false">
                Email
                <span class="star">&nbsp;*</span>
                </label><input type="email" name="email" id="jform_password" value="<?php echo $dat['email']; ?>" class="inputbox required" aria-invalid="false"	 /> <br />
            </li>
            
            
     
        <li><label id="jform_name-lbl"> <input type="submit" name="edit" value="Edit"/></label></li>
        </ul>
        </fieldset>
	</div>
</form>
</body>
</html>