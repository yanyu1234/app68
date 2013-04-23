<div id="bd" class="fix">
<div class="col-l pr">
<ul class="pa snv" id="side">
	<li class="on"><a href="<?php echo site_url('portal/channel')?>">频道管理</a></li>
	<li><a href="<?php echo site_url('portal/article')?>">文章管理</a></li>
	<li><a href="<?php echo site_url('portal/comment')?>">评论管理</a></li>
	<li><a href="<?php echo site_url('portal/static')?>">生成静态页</a></li>
</ul>
</div>
<div class="col-r" id="iframe_container">
<iframe id="frame_content" name="fra" src="<?php echo site_url('portal/channel')?>" scrolling="no" frameborder="0" style="height:400px;"></iframe>
<?php back_container_js();?>
</div>
</div>