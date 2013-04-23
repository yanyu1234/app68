<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php load_css('admin/cui,admin/frame,admin/mind'); load_lib('jquery');?>
</head>

<body>
<div class="main">
	<div class="table">
		<form action="http://192.168.1.105/zgz/admin.php/login/user_message/edit.html" method="post" enctype="multipart/form-data" class="form">
			<table>
				<tr><td></td><td></td></tr>
				<tr>
					<td width="50px" colspan="2"><?php echo $message;?></td>
				</tr>
				<tr>
					<td><?php foreach ($option_link as $k=>$v) :?><a href="<?php echo $v?>"><?php echo $k?></a>&nbsp;&nbsp;<?php endforeach;?></td>
					<td></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<script type="text/javascript">
var m = <?php echo $seconds?>;
window.setInterval(function(){
	m--;
	if(m == 0) window.location.href = "<?php echo $finish_url?>";
},1000);
</script>
</body>
</html>