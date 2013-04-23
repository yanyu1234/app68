<div class="main">
<div class="itemtitle">
	<h2 class="left color09c">权限设置</h2>
	<ul class="left nav-tab">
		<li class="current"><a href=""><span>权限列表</span></a></li>
		<li ><a href="<?php echo site_url('root/add_right')?>"><span>添加权限</span></a></li>
	</ul>
</div>		
<!-- 列表start -->
<div class="btn-box">共<?php echo $count;?>条记录</div>
<div class="table">
<table>
	<tr>
		<th width="10%">权限ID</th>
		<th width="30%">权限名称</th>
		<th width="20%">权限URI</th>
		<th width="10%">请求方式</th>
		<th width="14%">操作</th>
	</tr>
	<?php foreach ($rights  as $right):?>
	<tr>
		<td><?php echo $right['id'];?></td>
		<td>
			<?php echo $right['right_name'];?>
		</td>
		<td>
			<?php echo $right['uri'];?>
		</td>
		<td>
			<?php echo $right['request_method'];?>
		</td>
		<td>
			<a href="<?php echo site_url('root/edit_right/'.$right['id']);?>">编辑</a>
			<a href="javascript:do_post_refresh('<?php echo site_url('root/delete_right/'.$right['id']);?>','确实要删除这个权限么？')" class="delete">删除</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<?php echo $pages;?>
</div>
<!-- 列表end -->
</div>