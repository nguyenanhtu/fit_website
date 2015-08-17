/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'http://' + document.location.host + '/fit3/public/ckeditor/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = 'http://' + document.location.host + '/fit3/public/ckeditor/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = 'http://' + document.location.host +'/fit3/public/ckeditor/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = 'http://' + document.location.host +'/fit3/public/ckeditor/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = 'http://' + document.location.host +'/fit3/public/ckeditor/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = 'http://' + document.location.host +'/fit3/public/ckeditor/kcfinder/upload.php?type=flash';
	
};
