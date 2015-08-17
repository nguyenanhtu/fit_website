<?php
	$this->load->view("website/common/header");
?>	
		<div class="cont">
            <div class="nd_menu1">
                <h2>Các bài viết đã gửi</h2>
			</div>
			<table style="float:left">
				<thead style="background: none repeat scroll 0 0 #FFCC99;">
					<tr>
					<th>
						Tiêu đề
					</th>
					<th>
						Danh mục
					</th>
					<th>
						Trạng thái
					</th>
					<th>
						Ngày đăng
					</th>
					<th>
						Edit
					</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($dat as $rows)
						{
							$post_on = date("d-m-Y",strtotime($rows['post_on']));
							if($rows['status'] == FALSE)
							{
								$st = "Chưa duyệt";
							}
							else
							{
								$st = "Đã duyệt";
							}
							echo "<tr>";
								echo "<td>".$rows['title']."</td>";
								echo "<td>".$rows['cat_name']."</td>";
								echo "<td>".$st."</td>";
								echo "<td>".$post_on."</td>";
								if($rows['status'] == FALSE)
								{
									echo "<td>".anchor("users/edit_article/{$rows['article_id']}","Edit")."</td>";
								}
							echo "</tr>";
						}
					?>
				</tbody>
			</table>


<?php
	$this->load->view("website/common/footer");
?>