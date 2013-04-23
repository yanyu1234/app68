<div class="main">
<div class="itemtitle">
	<h2 class="left color09c">更新日志</h2>
	<ul class="left nav-tab">
		<li class="current"><a href=""><span>更新日志列表</span></a></li>
		<li ><a href="<?php echo site_url('root/add_updatelog')?>"><span>添加更新日志</span></a></li>
	</ul>
</div>		
<!-- 列表start -->
<div class="btn-box">共<?php echo $count;?>条记录</div>
<div class="table">
<table>
	<tr>
		<th width="10%">日志ID</th>
		<th width="30%">日志标题</th>
		<th width="20%">日志更新URL</th>
		<th width="10%">版本号</th>
		<th width="14%">操作</th>
	</tr>
	<?php foreach ($logs  as $log):?>
	<tr>
		<td><?php echo $log['id'];?></td>
		<td>
			<?php echo $log['title'];?>
		</td>
		<td>
			<?php echo $log['url'];?>
		</td>
		<td>
			<?php echo $log['main_version'];?>.<?php echo $log['sub_version'];?>
		</td>
		<td>
			<a href="<?php echo site_url('root/edit_update_log/'.$log['id']);?>">编辑</a>
			<a href="javascript:do_post_refresh('<?php echo site_url('root/delete_update_log/'.$log['id']);?>','确实要删除这篇日志么？')" class="delete">删除</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<?php echo $pages;?>
</div>
<!-- 列表end -->
</div>