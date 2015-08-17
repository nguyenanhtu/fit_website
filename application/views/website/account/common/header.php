<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/ac.css"/>
<title>Trang cá nhân</title>
</head>
<script src="<?php echo base_url(); ?>public/assets/js/jquery.js"></script>
<script type="text/javascript">
$(function(){

    if(localStorage.getItem('active'))
    {    
        $('.tabbed').find(localStorage.getItem('active')).addClass('active');
          $('.tabbed').find('a[href='+localStorage.getItem('active')+']').parent().addClass('active');

    }
    else
    {
        $('.tabbed').find('.tabcontent:first').addClass('active');
          $('.tabbed').find('.tabnav li:first').addClass('active');
    }
    $('.tabbed').find('.tabnav li').each(function(){
        $(this).click(function(){
            ntab = $(this).find('> a').attr('href');
            localStorage.setItem('active', ntab);
            $(this).parents('.tabbed').find('.active').removeClass('active');
            $(this).addClass('active');
            $(this).parents('.tabbed').find(ntab).addClass('active');
            return false;
        });    
    });
})
</script>
<body>