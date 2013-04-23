<div class="main">
<div class="itemtitle">
<h2 class="left color09c">系统变量</h2>
<ul class="left nav-tab">
	<li><a href="<?php echo site_url('root/env')?>"><span>系统变量</span></a></li>
	<li class="current"><a href="<?php echo site_url('root/add_env')?>"><span>添加系统变量</span></a></li>
</ul>
</div>
<div class="table">
<form action="" method="post" enctype="multipart/form-data" class="form">
<table>
	<tr>
		<td>名称</td>
		<td width=“75%”><input name='name' type="text" class="novoid" style="width: 300px;" value="<?php echo $env['name'];?>" /><span></span></td>
	</tr>
	<tr>
		<td width="50px">值</td>
		<td width=“75%”><input name='value' type="text" class="novoid" style="width: 300px;" value="<?php echo $env['value'];?>"/><span></span></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name='submit' type="submit" value='提交' class="btn" /></td>
	</tr>
</table>
</form>
</div>
</div>
