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
					<legend>Sửa bài viết</legend>
					<?php
					echo validation_errors();
					$att = array("id" => "item-form", "class" => "form-validate", "name" => "adminForm");
					echo form_open_multipart("users/edit_article/{$dat['article_id']}",$att);
					?>
					
					<label for="title">
						Title
					</label>
					<input type="text" size="40" name="title" value="<?php echo set_value('title',$dat['title']); ?>" />
					<label for="catid">
					</label>
					
					<label for="description">
						Description
					</label>
					<textarea name="description" style="width:100%"><?php echo set_value('description',$dat['description']); ?> </textarea>
					
					<select name="catid">
						<?php
							foreach($prepare as $row)
							{
							$key = $row['cat_name'];
							$value = $row['cat_id'];
						?>
						<option value="<?php echo $value; echo set_select('catid',$value); ?>" <?php if($value==$dat['cat_id']){ echo "selected='selected'";} ?> ><?php echo $key; ?></option>
						<?php
							}
						?>
					</select>
					
				
					<textarea id="content" name="content" style="width:100%" class="ckeditor"> <?php echo set_value('content',$dat['content']);  ?></textarea>
				   </fieldset>
				   <h3> <span> Attachment Files </span> </h3>
				   <input type="file" name="files[]" multiple />
				   
				   <input type="submit" name="submit" value="Sửa bài viết" style="height:60px"  />
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