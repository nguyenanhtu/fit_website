<?php
	$this->load->view("administrator/common/header.php");
?>

	<div id="content-box">
	  <div id="toolbar-box">
			<div class="m">
				<div class="toolbar-list" id="toolbar">
<ul>
<li class="button" id="toolbar-new">

<li class="button" id="toolbar-edit">
<span class="icon-32-new" >
</span>
<?php	echo anchor("administrator/user_admin/adduser","Add");?>
<?php echo form_open("administrator/user_admin/index");
	?>
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

<li class="divider">
</li>
<li class="button" id="toolbar-unpublish">
  <span class="icon-32-unpublish">
  </span>
  	
    <input type="submit" name="submitform" value="delete" onclick="return confirm('Bạn có chắc muốn xóa user này không?');" />
  
</li>

<li class="divider">
</li>

<li class="button" id="toolbar-archive"></li>

<li class="button" id="toolbar-checkin"></li>
</ul>
<div class="clr"></div>
</div>
					<div class="pagetitle icon-48-categories icon-48-content-categories">
					  <h2>Quản Lý User</h2></div>
			</div>
		</div>
	  <div id="system-message-container">
</div>
		<div id="element-box">
			<div class="m">
			  <blockquote>
			      <div class="clr"> </div>
			      
			      <table width="103%" height="84" class="adminlist">
			        <thead>
			          <tr>
			            <th width="41">
			              <input type="checkbox" name="checkall-toggle" value="" title="Check All" onClick="Joomla.checkAll(this)">
			              </th>
			            <th width="29">STT</th>
			            <th width="50">Username</th>
                        <th width="100">Họ và tên</th>
                        <th width="80">Trạng thái</th>
			            <th width="212">Ngày sinh</th>
			            <th width="150">Đơn vị</th>
			            <th width="59">Email </th>
			            <th width="90">User level</th>
                        <th width="90"></th>
                        <th width="90"></th>
		              </tr>
		            </thead>
			        <tbody>
			         
                      <?php
					  $i=1;
					  	foreach($dat as $row)
						{
						
					  ?> <tr class="row0">
			            <td class="center">
                        <?php
		                 echo "<input type='checkbox' name='uid' value='{$row["user_id"]}' >	";
						?>				
                        </td>
			            <td class="center"><label for="textfield"><?php echo $i++  ?></label></td>
			            <td><p class="center" title="sample-data-articles">
			              <label for="textfield2"><?php echo $row['user_name']; ?></label>
			            </p>
		                </td>
                        <td class="center"><label for="textfield4"><?php echo $row['name'] ;?></label></td>
			            <td class="center"><label for="textfield4"><?php if($row['status']=="Activated") {echo "<span class='jgrid'> <span class='state publish'><span class='text'>publish</span></span></span>";}
						else {echo "<span class='jgrid'><span class='state unpublish'><span class='text'>unpublish</span></span></span>";}
						?></label></td>
                        <td class="center"><label for="textfield4"><?php echo $row['birthday'] ;?></label></td>
			            <td class="center"><label for="textfield5"><?php echo $row['department'] ?></label></td>
			            <td class="center"><label for="textfield6"><?php echo $row['email'] ?></label></td>
			            <td class="center"><label for="textfield7"><?php echo $row['user_level'] ?></label></td>
                        <td class="center">
								<?php
									echo anchor("administrator/user_admin/edituser/{$row['user_id']}","Edit");
								?>
						</td>
			            </tr>
                        <?php
						}
						?>
			          </tbody>
		          </table>
		        </form>
		      </blockquote>
            </div>
		</div>
	</div>

	<p align="center">&nbsp;</p>
<div id="sbox-overlay" aria-hidden="true" tabindex="-1" style="z-index: 65555; opacity: 0;"></div></body></html>