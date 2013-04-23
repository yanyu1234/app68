<div class="main">
<div class="itemtitle">
	<h2 class="left color09c">系统变量</h2>
	<ul class="left nav-tab">
		<li class="current"><a href=""><span>系统变量列表</span></a></li>
		<li ><a href="<?php echo site_url('root/add_env')?>"><span>添加系统变量</span></a></li>
	</ul>
</div>		
<!-- 列表start -->
<div class="btn-box">共<?php echo $count;?>条记录</div>
<div class="table">
<table>
	<tr>
		<th width="10%">变量ID</th>
		<th width="20%">变量名称</th>
		<th width="10%">变量值</th>
		<th width="14%">操作</th>
	</tr>
	<?php foreach ($envs  as $env):?>
	<tr>
		<td><?php echo $env['id'];?></td>
		<td>
			<?php echo $env['name'];?>
		</td>
		<td>
			<?php echo $env['value'];?>
		</td>
		<td>
			<a href="<?php echo site_url('root/edit_env/'.$env['id']);?>">编辑</a>
			<a href="javascript:do_post_refresh('<?php echo site_url('root/delete_env/'.$env['id']);?>','确实要删除这个变量么？')" class="delete">删除</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<?php echo $pages;?>
</div>
<!-- 列表end -->
</div>