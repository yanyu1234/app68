<div id="bd" class="fix">
<div class="col-l pr">
<ul class="pa snv" id="side">
	<li class="on"><a href="<?php echo site_url('root/updatelog')?>">更新日志</a></li>
	<li><a href="<?php echo site_url('root/right')?>">权限设置</a></li>
	<li><a href="<?php echo site_url('root/cron')?>">任务计划</a></li>
	<li><a href="<?php echo site_url('root/env')?>">系统变量</a></li>
</ul>
</div>
<div class="col-r" id="iframe_container">
<iframe id="frame_content" name="fra" src="<?php echo site_url('root/updatelog')?>" scrolling="no" frameborder="0" style="height:400px;"></iframe>
<?php back_container_js();?>
</div>
</div>