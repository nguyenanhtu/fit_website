<?php
	$this->load->view("administrator/common/header");
?>

<div id="content-box">
	<div id="toolbar-box">
			<div class="m">
			<?php 
			echo validation_errors();
			$attributes = array('id' => 'adminForm', 'name' => 'adminForm');
			//echo form_open("administrator/categories_admin/");
			echo form_open("administrator/categories_admin/index");
		?>
				<div id="toolbar" class="toolbar-list">
					<ul>
						<li id="toolbar-new" class="button">
						<a class="toolbar"  href="<?php echo base_url() ?>administrator/categories_admin/add.html">
						<span class="icon-32-new">
						</span>
						New
						</a>
						</li>

						<li class="divider">
						</li>

					

						<li id="toolbar-trash" class="button">
						<span class="icon-32-trash">
						</span>
						<input type="submit" value="delete"  name="submitform" onclick="return confirm('Bạn có chắc muốn xóa danh mục này ?');" />
						</li>


						<li class="divider">
						</li>


						<li class="divider">
						</li>
					</ul>
				<div class="clr"></div>
				</div>
				<div class="pagetitle icon-48-categories icon-48-content-categories">
				<h2>Category Manager</h2>
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
				<th>
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.title','asc','');return false;" href="#">Title</a>			
				</th>
				<th width="5%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.published','asc','');return false;" href="#">Status</a>				
				</th>
				<th width="10%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.lft','desc','');return false;" href="#">Parent_Category</a>						
				</th>
				<th width="15%">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.title','asc','');return false;" href="#">Description</a>				
				</th>
				<th width="1%" class="nowrap">
					<a title="Click to sort by this column" onclick="Joomla.tableOrdering('a.id','asc','');return false;" href="#">ID</a>				</th>
			</tr>
		</thead>
					<div class="container">
						<div class="pagination">
							<?php
								echo $this->pagination->create_links();
							?>
						</div>
					</div>				
		<tbody>
		<?php
			foreach($dat as $rows)
			{
			$val = $rows['childId'];
			echo "<tr class='row0'>
				<td class='center'>
					<input type='checkbox' value='{$rows["childId"]}' name='cid[]'>
				</td>
				<td>";
			?>
				<?php echo anchor("administrator/categories_admin/edit/{$rows['childId']}",$rows['childName']); ?>
			<?php
			echo 
				"</td>
				<td class='center'>";
			?>
			
			<?php
				if($rows['childStatus'] == TRUE)
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
					{$rows['parentName']}
				</td>
				<td>
					{$rows['childDesc']}
				</td>
				<td>
					{$rows['childId']}
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