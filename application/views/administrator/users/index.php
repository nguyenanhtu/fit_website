<?php
	$this->load->view("administrator/common/header");
	if(!empty($prevent))
	{
		echo $prevent;
	}
?>

<div id="content-box">
	<div id="toolbar-box">
			<div class="m">
			<?php 
			echo validation_errors();
			$attributes = array('id' => 'adminForm', 'name' => 'adminForm');
			//echo form_open("administrator/categories_admin/");
			echo form_open("administrator/articles_admin/index");
		?>
				<div id="toolbar" class="toolbar-list">
					<ul>
						<li id="toolbar-new" class="button">
						<a class="toolbar"  href="<?php echo base_url() ?>administrator/articles_admin/add.html">
						<span class="icon-32-new">
						</span>
						New
						</a>
						</li>

						<li id="toolbar-edit" class="button">
						<a class="toolbar" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ Joomla.submitbutton('category.edit')}" 
						>
						<span class="icon-32-edit">
						</span>
						Edit
						</a>
						</li>

						<li class="divider">
						</li>

						<li id="toolbar-publish" class="button">
						<span class="icon-32-publish">
						</span>
						<input type="submit" value="publish"  name="submitform" />
					
						</a>
						</li>

						<li id="toolbar-unpublish" class="button">
						<span class="icon-32-unpublish">
						</span>
						<input type="submit" value="unpublish"  name="submitform" />
						</li>

						<li class="divider">
						</li>

						<li id="toolbar-trash" class="button">
						<span class="icon-32-trash">
						</span>
						<input type="submit" value="del"  name="submitform" onclick="return confirm('Bạn có chắc muốn xóa bài viết này ?');" />
						</li>
						
						<li id="toolbar-new" class="button">
						<a class="toolbar"  href="<?php echo base_url() ?>administrator/users_admin/add_list.html">
						<span class="icon-32-new">
						</span>
						Add list users
						</a>
						</li>

						<li class="divider">
						</li>


						<li class="divider">
						</li>
					</ul>
				<div class="clr"></div>
				</div>
				<div class="pagetitle icon-48-article">
				<h2>Users Manager</h2>
				</div>
			</div>
	</div>
	<div id="system-message-container"></div>
	<div id="element-box">
		<div class="m">
			<div class="clr"> </div>
		<table class="adminlist">
		<thead>
			<tr>
				<th width="1%">
					<input type="checkbox" onclick="Joomla.checkAll(this)" title="Check All" value="" name="checkall-toggle">
				</th>
				<th width="20%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.title','asc','');return false;" href="#">Full Name</a>			
				</th>
				<th width="5%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.published','asc','');return false;" href="#">User Name</a>				
				</th>
				<th width="5%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.published','asc','');return false;" href="#">Status</a>				
				</th>
				<th width="10%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.lft','desc','');return false;" href="#">User Group</a>						
				</th>
				<th width="10%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.title','asc','');return false;" href="#">Email</a>				
				</th>
				<th width="1%" class="nowrap">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.id','asc','');return false;" href="#">ID</a>				
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach($dat as $rows)
			{
			echo "<tr class='row0'>
				<td class='center'>
					<input type='checkbox' value='{$rows["user_id"]}' name='aid[]'>
				</td>
				<td>";
			?>
				<?php echo anchor("administrator/users_admin/edit/{$rows['user_id']}",$rows['name']); ?>
			
			<?php
				echo "</td>
				<td class='center'>
					{$rows['user_name']}
				</td>
				<td>";
				
			?>
			
			<?php
				if($rows['status'] == TRUE)
				{
					echo "<span class='jgrid'><span class='state publish'><span class='text'>Published</span></span></span>";
				}
				else
				{
					echo "<span class='jgrid'><span class='state unpublish'><span class='text'>Unpublished</span></span></span>";
				}
				
			?>
			
			<?php
			echo 
				"</td>
				<td>
					{$rows['user_level']}
				</td>
				<td>
					{$rows['email']}
				</td>
				<td>";
			?>
			
		
			
			<?php
			echo
	           "</td>				
				<td>
					{$rows['user_id']}
				</td>	
			</tr>";
			}
			?>
		</tbody>
		</form>
		</div>
	</div>
</div>
	<div id="footer">
		<p class="copyright">
		</p>
	</div>
</body>
</html>