<div id="center" class="khoi-content-right khoi-vjustyfy" style="height: 2042px;">
	<div id="squeeze">
		<div class="right-corner ">
			<div class="left-corner khoi-vjustyfy" style="height: 2042px;">
				<div class="khoi-tren-h2-content">          	
                </div>
				<h2 id="the-h2-tren">Tin tức &amp; Sự kiện</h2>
					<div class="khoi-tren-content"> </div>
					<div class="clear-block div-content-ie7">
					</div>
						<div class="view view-view-menu-chinh view-id-view_menu_chinh view-display-id-page_1 view-dom-id-1">
						</div>
						<div class="view-content">
							<div class="item-list">
								<ul>
									<?php
										$i=1;
										foreach($dat as $rows)
			
			{	
				if(empty($rows['thumbnail']))
				{
					$path = "no-image.jpg";
				}
				else
				{
					$path = $rows['thumbnail'];
				}
				
				echo "<li class='views-row views-row-$i views-row-odd views-row-first'>";
									?>
									<div class="views-field-field-anh-mo-ta-fid">
										<span class="field-content">
											<img class="imagecache imagecache-img-tin-tuc" width="125" height="83" title="" alt="" src="<?php echo base_url(); ?>public/ckeditor/kcfinder/upload/.thumbs/images/<?php echo $path; ?>" />
										</span>
									</div>
									<div class="views-field-title">
										<span class="field-content">
											<a href=""> <?php echo $rows['title']; ?> </a>
										</span>
									</div>
									<div class="views-field-field-mo-ta-value">
										<div class="field-content">
											<?php
												echo substr($rows['content'],0,strrpos($rows['content'],' ')); 
											?>
										</div>
									</div>
								</li>
						<?php
							$i++;
							}
						?>
								</ul>
							</div>
						</div>
			</div>
		</div>
	</div>
</div>
	</div>

</div>