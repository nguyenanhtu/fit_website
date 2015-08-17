<?php
	$this->load->view("website/common/header");
?>	
        <?php
			if(!empty($ck) && !empty($msg))
			{
				echo "<script type='text/javascript'>
							alert('$msg');
					  </script>
				";
			}
		?>
		
            <!--NOI DUNG-->
            <div class="cont">
				<fieldset class="adminform">
					<legend>Gửi bài viết</legend>
					<?php
					echo validation_errors();
					$att = array("id" => "item-form", "class" => "form-validate", "name" => "adminForm");
					echo form_open_multipart("users/send_article",$att);
					?>
					
					<label for="title">
						Title
					</label>
					<input type="text" size="40" name="title" />
					<label for="description">
					</label>
					
					<label for="description">
						Description
					</label>
					<textarea name="description" style="width:100%"> </textarea>
					
					<!-- Giữ nguyên tên catid do sẽ insert bài viết bằng hàm trong 
					file articles_model chứ ko phải trong user_model-->
					<select name="catid">
									<?php
										foreach($prepare as $row)
										{
											$key = $row['cat_name'];
											$value = $row['cat_id'];
											/* Ở đây do mặc định mỗi lần dùng */
											echo "<option value='$value'>".$key."</option>";
										}
									?>
					</select>
					
				
					<textarea id="content" name="content" style="width:100%" class="ckeditor"></textarea>
				   </fieldset>
				   <h3> <span> Attachment Files </span> </h3>
				   <input type="file" name="files[]" multiple />
				   
				   <input type="submit" name="submit" value="Tạo bài viết" style="height:60px"  />
				   </form>
            </div>
            <!--END NOI DUNG-->
            
</div>
    <!--END CONTENT-->
    
</div>    
<!--END MAIN-->



<?php
	$this->load->view("website/common/footer");
?>	