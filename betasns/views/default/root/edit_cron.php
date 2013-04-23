<div class="main">
<div class="itemtitle">
<h2 class="left color09c">任务计划</h2>
<ul class="left nav-tab">
	<li><a href="<?php echo site_url('root/cron')?>"><span>任务计划列表</span></a></li>
	<li class="current"><a href="<?php echo site_url('root/add_cron')?>"><span>添加任务计划</span></a></li>
</ul>
</div>
<div class="table">
<form action="" method="post" enctype="multipart/form-data" class="form">
<table>
	<tr>
		<td>URI</td>
		<td width=“75%”><input name='uri' type="text" class="novoid" style="width: 300px;" value="<?php echo $cron['uri']?>" /><span></span></td>
	</tr>
	<tr>
		<td width="50px">请求方式</td>
		<td width=“75%”><select name="request_method"><option value="GET">GET</option><option value="POST">POST</option></select><span></span></td>
	</tr>
	<tr>
		<td width="50px">请求附加信息</td>
		<td width=“75%”><span><textarea name="cron_data" style="width:300px;height:200px"><?php echo $cron['cron_data']?></textarea></span></td>
	</tr>
	<tr>
		<td width="50px">计划类型</td>
		<td width=“75%”><select name="cron_type"><option value="hour">每小时</option><option value="day">每天</option><option value="week">每周</option><option value="month">每月</option></select><span></span></td>
	</tr>
	<tr>
		<td>不限权限</td>
		<td width=“75%”><input name='cancel' value="true" type="checkbox" class="novoid" style="width: 300px;" /><span></span></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name='submit' type="submit" value='提交' class="btn" /></td>
	</tr>
</table>
</form>
<script type="text/javascript">
_n("request_method").val("<?php echo $cron['request_method'];?>");
_n("cron_type").val("<?php echo $cron['cron_type'];?>");
_n("cancel").attr("checked",<?php echo $cron['cancel'] == 1 ? 'true':'false'?>);
</script>
</div>
</div>
