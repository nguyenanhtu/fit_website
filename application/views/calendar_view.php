<?php
	$this->load->view("administrator/common/header");
	if($this->input->post('datepicker'))
	{
		$date = $this->input->post('datepicker');
		echo $date;
	}
?>


<?php
	echo form_open("calendar/index");
?>
<script type="text/javascript">
	$(function() {
    $("#datepicker").datepicker({
        showButtonPanel: true
    });
});
</script>
 <input type="text" id="datepicker" name="datepicker" value="Date"/>
 <input type="submit" id="submitMe" name="submitMe" />
</form>
</body>
</html>