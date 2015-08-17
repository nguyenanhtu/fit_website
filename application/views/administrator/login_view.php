<!doctype html>
<html>
	<head>
		<link href="<?php echo  base_url(); ?>public/assets/css/system.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo  base_url(); ?>public/assets/css/template.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="border-top" class="h_blue">
		<span class="title"><a href="index.php">Administration</a></span>
	</div>
	<div id="content-box">
			<div id="element-box" class="login">
				<div class="m wbg">
					<h1>Administration Login</h1>
					<?php
					if(!empty($msg))
					{
					echo	"<div id='system-message-container'>
								<dl id='system-message'>
									<dt class='error'>Error</dt>
										<dd class='error message'>
											<ul>
												<li>$msg</li>
											</ul>
										</dd>
								</dl>
							</div>";
					}
					
					echo validation_errors("<div id='system-message-container'><dl id='system-message'><dt class='error'>Error</dt><dd class='error message'><ul><li>","</li></ul></dd></dl></div>");
					?>
	
					<div id="section-box">
						<div class="m">
						<?php
							$att = array('id' => 'form-login');
							echo form_open("administrator/index/index",$att);
						?>
							<form id="form-login" method="post" action="/joomla2/administrator/index.php">
								<fieldset class="loginform">
									<label for="mod-login-username" id="mod-login-username-lbl">User Name</label>
									<input type="text" size="15" class="inputbox" id="mod-login-username" name="username" />
									<label for="mod-login-password" id="mod-login-password-lbl">Password</label>
									<input type="password" size="15" class="inputbox" id="mod-login-password" name="password">
									<div class="button-holder">
										<div class="button1">
											<div class="next">
												<input type="submit" value="Log in" />
											</div>
										</div>
									</div>

								<div class="clr"></div>
									
								</fieldset>
							</form>
							<div class="clr"></div>
						</div>
					</div>
					<p>Hãy sử dụng đúng tên đăng nhập và password để truy cập trang admin</p>
					<p><a href="">Trở về trang chủ</a></p>
					<div id="lock"></div>
				</div>
			</div>
	</div>
	</body>
</html>
