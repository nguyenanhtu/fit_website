<html>
	<head>
	</head>
	<body>
<?php 
	echo form_open_multipart("multi_upload/do_multi_upload");
?>

		<input type="file" name="files[]" multiple />
        <input type="submit" name="submit" value="submit" />
    </form>
	</body>
</html>