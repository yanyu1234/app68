<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php load_css('admin/cui,admin/frame,admin/mind');load_lib('jquery');?>
	<script type="text/javascript" src="<?php echo site_url('main/js');?>"></script>
</head>
<body>
<div class="currentloca">
<?php if(isset($operate) && is_array($operate)):?>
<p id="admincpnav"><?php echo implode("&nbsp;&nbsp;", $operate) . "&nbsp;&nbsp;";?>
	<a title="添加到常用操作" href="<?php echo current_url()?>" class="add_by_id">[+]</a>
</p>
<?php endif;?>
<div class="sitemapbtn">
<div style="float: left; margin:-7px 10px 0 0">
<form name="search" method="post" autocomplete="off" action="<?php if(isset($main_search_action)) echo $main_search_action;?>" target="main">
<input type="text" name="keywords" value="" class="txt" x-webkit-speech="" speech="">
<input type="hidden" name="searchsubmit" value="yes" class="btn">
<input type="submit" name="searchsubmit" value="搜索" class="btn" ></form></div>
<span id="add2custom" style="display: none"></span>
<a href="###" id="cpmap" onclick="showMap();return false;"><img src="<?php echo static_image_url('admin/btn_map.gif')?>" title="管理中心导航(ESC键)" width="46" height="18"></a>
</div>
</div>
<?php echo $content;?>
</body>
</html>