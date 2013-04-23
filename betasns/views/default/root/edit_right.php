<div class="main">
<div class="itemtitle">
<h2 class="left color09c">权限设置</h2>
<ul class="left nav-tab">
	<li><a href="<?php echo site_url('root/right')?>"><span>权限列表</span></a></li>
	<li class="current"><a href="<?php echo site_url('root/add_right')?>"><span>添加权限</span></a></li>
</ul>
</div>
<div class="table">
<form action="" method="post" enctype="multipart/form-data" class="form">
<table>
	<tr>
		<td width="50px">名称</td>
		<td width=“75%”><input name='name' type="text" class="novoid" style="width: 300px;" value="<?php echo $right['right_name']?>" /><span></span></td>
	</tr>
	<tr>
		<td>请求URI</td>
		<td width=“75%”><input name='uri' type="text" class="novoid" style="width: 300px;" value="<?php echo $right['uri']?>"/><span></span></td>
	</tr>
	<tr>
		<td width="50px">请求方式</td>
		<td width=“75%”><select name="request_method"><option value="GET">GET</option><option value="POST">POST</option></select><span></span></td>
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
	_n("request_method").val("<?php echo $right['request_method']?>");
	_n("cancel").attr("checked",<?php echo $right['cancel'] == 1 ? 'true':'false'?>);
</script>
</div>
</div>
