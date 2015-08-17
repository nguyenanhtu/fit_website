 <?php
	$this->load->view("website/common/header");
?>

 <h2>Login</h2>
 <?php 
 if(!empty($msg))
 {
    echo "<div class='alert alert-error'> 
                              <a class='close' data-dismiss='alert'>x</a>
                              <strong> Lỗi ! </strong> $msg
        </div>";
 }
 $attr = array('class' => 'form-horizontal');
 echo form_open('login/index',$attr);?>
  <div class="control-group">
    <label class="control-label" for="inputEmail">User name</label>
        <div class="controls">
      <input type="text" id="inputEmail" placeholder="User name" name="username" />
      <?php echo form_error('username','<div class="alert alert-error"> <a class="close" data-dismiss="alert">×</a> <strong>Error</strong>' , '</div>'); ?>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password" name="password" />
      <?php echo form_error('password','<div class="alert alert-error"> <a class="close" data-dismiss="alert">×</a> <strong>Error</strong>' , '</div>'); ?>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox" name="remem" /> Remember me
      </label>
      <button type="submit" class="btn">Sign in</button>
      <?php echo anchor('users/retrieve_pass','Forgot Password ?'); ?>
    </div>
  </div>
</form>

<?php
	$this->load->view("website/common/footer");
?>