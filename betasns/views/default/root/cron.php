<div class="main">
<div class="itemtitle">
	<h2 class="left color09c">任务计划</h2>
	<ul class="left nav-tab">
		<li class="current"><a href=""><span>任务计划列表</span></a></li>
		<li ><a href="<?php echo site_url('root/add_cron')?>"><span>添加任务计划</span></a></li>
	</ul>
</div>		
<!-- 列表start -->
<div class="btn-box">共<?php echo $count;?>条记录</div>
<div class="table">
<table>
	<tr>
		<th width="10%">任务ID</th>
		<th width="20%">任务URI</th>
		<th width="10%">请求方式</th>
		<th width="10%">请求类型</th>
		<th width="14%">操作</th>
	</tr>
	<?php foreach ($crons  as $cron):?>
	<tr>
		<td><?php echo $cron['id'];?></td>
		<td>
			<?php echo $cron['uri'];?>
		</td>
		<td>
			<?php echo $cron['request_method'];?>
		</td>
		<td>
			<?php echo $cron['cron_type'];?>
		</td>
		<td>
			<a href="<?php echo site_url('root/edit_cron/'.$cron['id']);?>">编辑</a>
			<a href="javascript:do_post_refresh('<?php echo site_url('root/delete_cron/'.$cron['id']);?>','确实要删除这个权限么？')" class="delete">删除</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<?php echo $pages;?>
</div>
<!-- 列表end -->
</div>