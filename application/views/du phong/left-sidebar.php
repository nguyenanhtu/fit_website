<div class="cont">
            
                <div class="menu_trai">
                	<table cellpadding="0" cellspacing="0" align="center" border="0" width="840">
  <!--DWLayoutTable-->
  <tbody><tr>
    <td height="256" width="840">
	
<script type="text/javascript">
window.addEvent('domready', function(){
	var accordion = new Accordion('h3.menusection', 'div.menusection', {
		opacity: false,
		onActive: function(toggler, element){
			toggler.setStyle('color', 'transparent');
			toggler.setStyle('background','transparent');

		},
		
		onBackground: function(toggler, element){
			toggler.setStyle('color', 'transparent');
			toggler.setStyle('background','transparent');

		}
	}, $('accordion'));
}); 
</script>

	<table cellpadding="0" cellspacing="0">
                <tbody><tr><td height="10"></td></tr>
                <tr>
                    <td align="center" valign="top" width="257">
                    

                            <div id="main">
                            <div id="accordion">
                            
                              
                            <h3 style="color: transparent; background: none repeat scroll 0% 0% transparent;" class="toggler menusection"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="hgfhgf" align="left" background="<?php echo base_url(); ?>public/assets/images/bgmn.jpg" height="29" valign="middle" width="221">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TRANG CHỦ</td></tr></tbody></table></h3>
                            <div style="padding-top: 0px; border-top: medium none; padding-bottom: 0px; border-bottom: medium none; overflow: hidden; height: 0px;" class="element menusection">
                            <ul>                             
                                          
                            </ul>
                            </div>
                            
							<?php
							foreach($temp3 as $t3)
							{
							if(!empty($t3['cat_name']) && ($t3['cat_name'] != "Root"))
							{
							?>
                            <h3 style="color: transparent; background: none repeat scroll 0% 0% transparent;" class="toggler menusection"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="hgfhgf" align="left" background="<?php echo base_url(); ?>public/assets/images/bgmn.jpg" height="29" valign="middle" width="221">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $t3['cat_name'];  ?></td></tr></tbody></table></h3>
                            <div style="padding-top: 0px; border-top: medium none; padding-bottom: 0px; border-bottom: medium none; overflow: hidden; height: 0px;" class="element menusection">
                            <ul>                             
								<?php
									if(!empty($t3['cat_id']))
									{
										foreach($temp2 as $t2)
										{
											foreach($t2 as $t22)
										    {
												if($t22['parent_id'] == $t3['cat_id'])
												{
													echo "<li>";
								?>
														<a href=""><table cellpadding="0" cellspacing="0"><tbody><tr><td align="left" valign="middle" width="221"><a href="" class="conmenu">&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;<?php echo $t22['cat_name']; ?></a></td></tr></tbody></table>
														</a> 
								<?php
													echo "</li>";
												}
											}
										}
									}
							}
								?>
                                          
                            </ul>
                            </div>
							<?php
							}
							foreach($temp4 as $t4)
							{
							?>
							<h3 style="color: transparent; background: none repeat scroll 0% 0% transparent;" class="toggler menusection"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="hgfhgf" align="left" background="<?php echo base_url(); ?>public/assets/images/bgmn.jpg" height="29" valign="middle" width="221">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $t4['cat_name'];  ?></td></tr></tbody></table></h3>
                            <div style="padding-top: 0px; border-top: medium none; padding-bottom: 0px; border-bottom: medium none; overflow: hidden; height: 0px;" class="element menusection">
                            <ul>                             
                                          
                            </ul>
                            </div>
							<?php
							}
							?>
                                     
                                  
                                                                        
                            </div>
                                     
                                     
                            </div>
                                     
                                                           
                            </div>
                            
                     </div>
                    
                    </td>
                    <td width="4"></td>
                </tr>
    <tr><td height="12"></td></tr>
                
            </tbody></table>
	
	
	&nbsp;</td>
  </tr>
</tbody></table>
  	
                </div>