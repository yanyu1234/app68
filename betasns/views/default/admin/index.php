<div id="bd" class="fix">
<div class="col-l pr">
<ul class="pa snv" id="side">
	<li class="on"><a href="<?php echo site_url('admin/llist')?>">管理员列表</a></li>
	<li><a href="<?php echo site_url('admin/group')?>">用户组管理</a></li>
	<li><a href="<?php echo site_url('admin/login_log')?>">登录日志</a></li>
	<li><a href="<?php echo site_url('admin/admin_log')?>">管理日志</a></li>
</ul>
</div>
<div class="col-r" id="iframe_container">
<iframe id="frame_content" name="fra" src="<?php echo site_url('admin/llist')?>" scrolling="no" frameborder="0" style="height:400px;"></iframe>
<?php back_container_js();?>
</div>
</div>