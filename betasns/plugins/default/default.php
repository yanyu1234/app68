<?php

beta_add_action("admin_logined","default_admin_logined");

function default_admin_logined($current_user){
	set_cookie('current_admin_user_id',$current_user['id'],time()+3600);
	set_cookie('current_admin_user_role',$current_user['admin_role'],time()+3600);
	set_cookie('current_admin_user_name',$current_user['admin_name'],time()+3600);
	$admin_model = beta_get_model("admin_model");
	if($admin_model->update_login_time($current_user['id'])){
		return true;
	} else {
		log_message(LOG_ERR,"update last login time failed!  error user:" . print_r($current_user,true));
		return false;
	}
}
