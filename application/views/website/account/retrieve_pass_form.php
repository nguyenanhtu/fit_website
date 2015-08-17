<?php
	$this->load->view("website/common/header");
?>
            
<div id="content">
    <h2> Cấp lại Password </h2>
    <?php
        if(!empty($msg) && !empty($ck))
        {
            switch($ck)
            {
                case 'success':
                    echo "<div class='alert alert-success'> 
                              <a class='close' data-dismiss='alert'>x</a>
                              <strong> Thành công ! </strong> $msg
                          </div>";
                    break;
                    
                case 'failed' :
                    echo "<div class='alert alert-error'> 
                              <a class='close' data-dismiss='alert'>x</a>
                              <strong> Lỗi! </strong> $msg
                          </div>";
                    break;
                    
            }
        }
        $attr = array('class' => 'form-horizontal');
        echo form_open('users/retrieve_pass',$attr);
    ?>
    <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email" name="email" value="<?php if($this->input->post('email')){ echo set_value('email');}  ?>" />
      <?php echo form_error('email','<div class="alert alert-error"> <a class="close" data-dismiss="alert">×</a> <strong>Error</strong>' , '</div>'); ?>
        </div>
    </div>
    
    <div class="control-group">
    <button type="submit" class="btn">Khôi phục password</button>
    </div>
    </form>
    
</div>

<?php
	$this->load->view("website/common/footer");
?>