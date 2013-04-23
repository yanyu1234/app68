<div class="main">
<div class="itemtitle">
<h2 class="left color09c">更新日志</h2>
<ul class="left nav-tab">
	<li><a href="<?php echo site_url('root/updatelog')?>"><span>更新日志列表</span></a></li>
	<li class="current"><a href="<?php echo site_url('root/add_updatelog')?>"><span>添加更新日志</span></a></li>
</ul>
</div>
<div class="table">
<form action="" method="post" enctype="multipart/form-data" class="form">
<table>
	<tr>
		<td width="50px">名称</td>
		<td width=“75%”><input name='title' type="text" class="novoid" style="width: 300px;" /><span></span></td>
	</tr>
	<tr>
		<td>内容</td>
		<td><textarea style="width: 300px; height: 300px" name="content"></textarea></td>
	</tr>
	<tr>
		<td>更新URL</td>
		<td width=“75%”><input name='url' type="text" class="novoid" style="width: 300px;" /><span></span></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name='submit' type="submit" value='提交' class="btn" /></td>
	</tr>
</table>
</form>
</div>
</div>
