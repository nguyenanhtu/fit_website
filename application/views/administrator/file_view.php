<?php
	$this->load->view("administrator/common/header");
?>

<?php echo form_open('administrator/file_admin/index'); ?>
	<div id="content-box">
		<div id="toolbar-box">
			<div class="m">
				<div class="toolbar-list" id="toolbar">
<ul>
<li class="button" id="toolbar-new">
<a href="" onclick="Joomla.submitbutton(&#39;category.add&#39;)" class="toolbar">
<span class="icon-32-delete">
</span>
Delete
</a>
</li>

<li class="button" id="toolbar-publish">
  <span class="icon-32-publish">
  </span>
  <input type="submit" value="publish" name="submitform"/>
</li>

<li class="button" id="toolbar-unpublish">

<span class="icon-32-unpublish">
</span>
<input type="submit" value="unpublish" name="submitform"/>
</li>
</ul>
<div class="clr"></div>
</div>
					<div class="pagetitle icon-48-categories icon-48-content-categories">
					  <h2>Quản Lý Tài Nguyên</h2></div>
			</div>
		</div>
						<div id="submenu-box"></div>
		
				
<div id="system-message-container">
</div>
		<div id="element-box">
			<div class="m">

	<fieldset id="filter-bar">
		<div class="filter-search fltlft">
			<label class="filter-search-lbl" for="filter_search">Filter:</label>
			<input type="text" name="filter_search" id="filter_search" value="" title="Search">
			<button type="submit">Search</button>
			<button type="button" onclick="document.id(&#39;filter_search&#39;).value=&#39;&#39;;this.form.submit();">Clear</button>
		</div>
	</fieldset>
	<div class="clr"> </div>

	<table class="adminlist">
		<thead>
			<tr>
				<th width="42">
					<input type="checkbox" name="checkall-toggle" value="" title="Check All" onclick="Joomla.checkAll(this)">
				</th>
				<th width="47">ID</th>
				<th width="260">
					<a href="" onclick="Joomla.tableOrdering(&#39;a.title&#39;,&#39;asc&#39;,&#39;&#39;);return false;" title="Click to sort by this column">Tên</a>				</th>
				<th width="111">
					<a href="" onclick="Joomla.tableOrdering(&#39;a.published&#39;,&#39;asc&#39;,&#39;&#39;);return false;" title="Click to sort by this column">Trạng thái</a>				</th>
				<th width="161">
			    <a href="" onclick="Joomla.tableOrdering(&#39;a.lft&#39;,&#39;desc&#39;,&#39;&#39;);return false;" title="Click to sort by this column">Loại file</a></th>
				<th width="146" class="nowrap">Tên tác giả</th>
				<th width="146" class="nowrap"><a href="" onclick="Joomla.tableOrdering(&#39;a.lft&#39;,&#39;desc&#39;,&#39;&#39;);return false;" title="Click to sort by this column">Tên bài viết</a></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="15">
					<div class="container"><div class="pagination">

<div class="limit">Display #<select id="limit" name="limit" class="inputbox" size="1" onchange="Joomla.submitform();">
	<option value="5">5</option>
	<option value="10">10</option>
	<option value="15">15</option>
	<option value="20" selected="selected">20</option>
	<option value="25">25</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="0">All</option>
</select>
</div><div class="button2-right off"><div class="start"><span>Start</span></div></div><div class="button2-right off"><div class="prev"><span>Prev</span></div></div>
<div class="button2-left"><div class="page"><span>1</span><a href="#" title="2" onclick="document.adminForm.limitstart.value=20; Joomla.submitform();return false;">2</a>
</div></div><div class="button2-left"><div class="next"><a href="" title="Next" onclick="document.adminForm.limitstart.value=20; Joomla.submitform();return false;">Next</a></div></div><div class="button2-left"><div class="end"><a href="" title="End" onclick="document.adminForm.limitstart.value=20; Joomla.submitform();return false;">End</a></div></div>
<div class="limit">Page 1 of 2</div>
<input type="hidden" name="limitstart" value="0">
</div></div>				</td>
			</tr>
		</tfoot>
		<tbody>		<?php
					$i=1;
					  	foreach($dat as $row)
						{
						
					  ?>
							<tr class="row0">
					<td class="center"><input type="checkbox" value="<?php echo $row['rid'];?>" name="rid"/></td>
					<td><?php echo $i++?></td>
					<td><p class="smallsub" title="sample-data-articles"><?php echo anchor("administrator/file_admin/download/{$row['rid']}",$row['rname']);?></p>
					</td>
					<td class="center">
						<?php if($row['status']==1) {echo "<span class='jgrid'> <span class='state publish'><span class='text'>Publish</span></span></span>";}
						else {echo "<span class='jgrid'><span class='state unpublish'><span class='text'>UnPublish</span></span></span>";}
						?>
                    </td>
					<td class="center"><?php echo $row['type'];?></td>
					<td class="center"><?php echo $row['uname'];?></td>
					<td class="center"><?php echo $row['title'];?></td>
				</tr>
                	<?php
						}
					?>
					</tbody>
	</table>
			  </form>
			</div>
		</div>
	</div>

	<p align="center">&nbsp;</p>
<div id="sbox-overlay" aria-hidden="true" tabindex="-1" style="z-index: 65555; opacity: 0;"></div></body></html>