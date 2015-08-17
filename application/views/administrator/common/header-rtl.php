<!doctype html>
<html>
<head>	
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js">
</script>

<link href="<?php echo  base_url(); ?>/public/assets/css/hightcontrast.css" rel="stylesheet" type="text/css" />
<link href="<?php echo  base_url(); ?>/public/assets/css/textbig.css" rel="stylesheet" type="text/css" />
<link href="<?php echo  base_url(); ?>/public/assets/css/error.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.css" />
</head>
<body id="minwidth-body">
	<div id="border-top" class="h_blue">
		<span class="logo"><a href="http://www.joomla.org" target="_blank"><img src="<?php echo  base_url(); ?>/public/assets/images/logo.png" alt="Joomla!" /></a></span>
		<span class="title"><a href="index.php">Admin Page</a></span>
	</div>
	<div id="header-box">
	<div id="module-menu">
			<ul id="menu">
<li class="node"><a href="#">Users</a><ul>
<li class="node"><a href="index.php?option=com_users&amp;view=users" class="icon-16-user">User Manager</a><ul class="menu-component" id="menu-com-users-users">
<li><a href="index.php?option=com_users&amp;task=user.add" class="icon-16-newarticle">Add New User</a></li>
</ul>
</li>
<li class="node"><a href="index.php?option=com_users&amp;view=groups" class="icon-16-groups">Groups</a><ul class="menu-component" id="menu-com-users-groups">
<li><a href="index.php?option=com_users&amp;task=group.add" class="icon-16-newarticle">Add New Group</a></li>
</ul>
</li>
<li class="node"><a href="index.php?option=com_users&amp;view=levels" class="icon-16-levels">Access Levels</a><ul class="menu-component" id="menu-com-users-levels">
<li><a href="index.php?option=com_users&amp;task=level.add" class="icon-16-newarticle">Add New Access Level</a></li>
</ul>
</li>
<li class="separator"><span></span></li>
<li class="node"><a href="index.php?option=com_users&amp;view=notes" class="icon-16-user-note">User Notes</a><ul class="menu-component" id="menu-com-users-notes">
<li><a href="index.php?option=com_users&amp;task=note.add" class="icon-16-newarticle">Add User Note</a></li>
</ul>
</li>
<li class="node"><a href="index.php?option=com_categories&amp;view=categories&amp;extension=com_users" class="icon-16-category">User Note Categories</a><ul class="menu-component" id="menu-com-categories-categories-com-users">
<li><a href="index.php?option=com_categories&amp;task=category.add&amp;extension=com_users" class="icon-16-newarticle">Add New Category</a></li>
</ul>
</li>
<li class="separator"><span></span></li>
<li><a href="index.php?option=com_users&amp;view=mail" class="icon-16-massmail">Mass Mail Users</a></li>
</ul>
</li>
<li class="node"><a href="#">Content</a><ul>
<li class="node"><a href="index.php?option=com_content" class="icon-16-article">Article Manager</a><ul class="menu-component" id="menu-com-content">
<li><a href="index.php?option=com_content&amp;task=article.add" class="icon-16-newarticle">Add New Article</a></li>
</ul>
</li>
<li class="node"><a href="index.php?option=com_categories&amp;extension=com_content" class="icon-16-category">Category Manager</a><ul class="menu-component" id="menu-com-categories-com-content">
<li><a href="index.php?option=com_categories&amp;task=category.add&amp;extension=com_content" class="icon-16-newarticle">Add New Category</a></li>
</ul>
</li>
<li><a href="index.php?option=com_content&amp;view=featured" class="icon-16-featured">Featured Articles</a></li>
<li class="separator"><span></span></li>
<li><a href="index.php?option=com_media" class="icon-16-media">Media Manager</a></li>
</ul>
</li>

</ul>

		</div>
		<div id="module-status">
			<span class="loggedin-users">0 Visitors</span><span class="backloggedin-users">1 Admin</span><span class="no-unread-messages"><a href="/joomla2/administrator/index.php?option=com_messages">0</a></span>
			<span class="viewsite"><a target="_blank" href="http://localhost/joomla2/">View Site</a></span><span class="logout"><a href="/joomla2/administrator/index.php?option=com_login&amp;task=logout&amp;b6aa206bf863ee800191e4c83c6a5afe=1">Log out</a></span>		
		</div>
		</div>
		<div class="clr"></div>
	</div>