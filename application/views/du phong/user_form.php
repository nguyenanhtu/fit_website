<?php
	$this->load->view("website/account/common/header");
?>	

<h2>User Profile</h2>
	
	<?php
	$attr = array('class' => 'form-horizontal');
	echo form_open("users/user_info/{$user['user_id']}",$attr);
	?>
	
	
	<fieldset>
		<legend>Avatar</legend>
		<div>
            <img class="avatar" src="<?php echo base_url(); ?>public/assets/images/<?php if(!empty($user['avatar'])) { echo $user['avatar'];} else { echo 'no_avatar.jpg';}  ?>" alt="avatar" />
        </div>
		<div>
			
		</div>
  </fieldset> 
  <fieldset>
	<legend>Inbox Message</legend>
		<div>
			<textarea id="content" name="content" style="width:100%" > </textarea>
		</div>
  </fieldset>
  
  <input type="hidden" name="from_user" value="<?php echo $this->session->userdata('user_id'); ?>" />
  
    <p><input type="submit" class="btn btn-primary" name="submit" value="Gửi Tin nhắn" /></p>
    </form>
  
	
</div>

<?php
	$this->load->view("website/account/common/footer");
?>	