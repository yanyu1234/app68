<div id="bd" class="fix">
<div class="col-l pr">
<ul class="pa snv" id="side">
	<li class="on"><a href="<?php echo site_url('content/diary')?>">日志</a></li>
	<li><a href="<?php echo site_url('content/pictrue')?>">图片</a></li>
	<li><a href="<?php echo site_url('content/comment')?>">评论</a></li>
</ul>
</div>
<div class="col-r" id="iframe_container">
<iframe id="frame_content" name="fra" src="<?php echo site_url('content/diary')?>" scrolling="no" frameborder="0" style="height:400px;"></iframe>
<?php back_container_js();?>
</div>
</div>