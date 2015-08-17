<?php
	$this->load->view("website/common/header");
?>

	<h2>List users </h2> 
	
	<ul>
		<?php
			foreach($users as $u)
			{
			echo "<li>";
			echo anchor("users/user_info/{$u['user_id']}",$u['name']);
			echo "</li>";
			}
		?>
	</ul>

<?php
	$this->load->view("website/common/footer");
?>