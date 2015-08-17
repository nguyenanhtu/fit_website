<?php
	$this->load->helper('download');
	$data = file_get_contents("./public/upload/{$file['name']}");
	$name = $file['name'];
	force_download($name,$data);
?>