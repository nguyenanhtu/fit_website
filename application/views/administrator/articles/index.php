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

						<li class="divider">
						</li>


						<li class="divider">
						</li>
					</ul>
				<div class="clr"></div>
				</div>
				<div class="pagetitle icon-48-article">
				<h2>Article Manager</h2>
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
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.title','asc','');return false;" href="#">Title</a>			
				</th>
				<th width="5%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.published','asc','');return false;" href="#">Status</a>				
				</th>
				<th width="10%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.lft','desc','');return false;" href="#">Category</a>						
				</th>
				<th width="10%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.title','asc','');return false;" href="#">Tác giả</a>				
				</th>
				<th width="10%" class="nowrap">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.id','asc','');return false;" href="#">Ngày tạo</a>				
				</th>
				<th width="10%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.title','asc','');return false;" href="#">Lượt xem</a>				
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
			$post_on = date("d-m-Y",strtotime($rows['post_on']));
			echo "<tr class='row0'>
				<td class='center'>
					<input type='checkbox' value='{$rows["article_id"]}' name='aid[]'>
				</td>
				<td>";
			?>
				<?php echo anchor("administrator/articles_admin/edit/{$rows['article_id']}",$rows['title']); ?>
			
			<?php
			echo 
				"</td>
				<td class='center'>";
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
					{$rows['cat_name']}
				</td>
				<td>
					{$rows['name']}
				</td>
				<td>
					{$post_on}
				</td>
				<td>
					{$rows['count_view']}
				</td>	
				<td>
					{$rows['article_id']}
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