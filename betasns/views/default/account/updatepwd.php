<?php load_lib('jquery_validate');?>
<div class="main">
<div class="table">
<form action="" method="post" enctype="multipart/form-data" class="form" id="updatepwdform">
<table>
	<tr>
		<td class="text_right" width="20%">旧密码</td>
		<td class="text_left" width=“80%”><input name='password' type="password" value=""  /></td>
	</tr>
	<tr>
		<td class="text_right" width="20%">新密码</td>
		<td class="text_left" width=“80%”><input id="new_password" name='new_password' type="password" value=""  /></td>
	</tr>
	<tr>
		<td class="text_right" width="20%">确认新密码</td>
		<td class="text_left" width=“80%”><input name='confirm_new_password' type="password" value="" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name='submit' type="submit" value='提交' /></td>
	</tr>
</table>
</form>
</div>
</div>
<script type="text/javascript">
$(function(){
	$("#updatepwdform").validate({
		rules:{
			password:{required:true},
			new_password:{required:true},
			confirm_new_password:{required:true,equalTo:"#new_password"}
		},
		onkeyup: function(element) { $(element).valid(); },
		onfocusout: function(element) { $(element).valid(); },
		messages:{
			password:{required:'请输入旧密码'},
			new_password:{required:'请输入新密码'},
			confirm_new_password:{required:'请输入确认密码',equalTo:'两次密码输入不一致'}
		}
	});
});
</script>