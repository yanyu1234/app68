<div class="main">
<div class="table">
<?php echo form_open();?>
<table>
	<tr>
		<td class="text_right" width="20%">用户名</td>
		<td class="text_left" width=“80%”><input id='text' name='username' type="text" value="<?php echo current_admin_user_name()?>" readonly /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input id='edit' name='submit' type="submit" value='提交' /></td>
	</tr>
</table>
<?php echo form_close();?>
</div>
</div>
