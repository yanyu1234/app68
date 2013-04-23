<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


define('ROOT_ADMIN_ROLE', -1);

/**
 * 获得当前管理员
 */
if ( ! function_exists('current_admin_user_name')) {
	
	function current_admin_user_name() {
		return read_cookie('current_admin_user_name');
	}
	
}

/**
 * 获得当前管理员
 */
if ( ! function_exists('current_admin_user_id')) {
	
	function current_admin_user_id() {
		return read_cookie('current_admin_user_id');
	}
	
}


/**
 * 获得当前管理员角色
 */
if ( ! function_exists('current_admin_user_role')) {
	
	function current_admin_user_role() {
		return read_cookie('current_admin_user_role');
	}
	
}


/**
 * 获得当前管理员角色
 */
if ( ! function_exists('admin_is_root')) {
	
	function admin_is_root() {
		if(!defined('IS_ADMIN_ROOT')) define('IS_ADMIN_ROOT', current_admin_user_role() == ROOT_ADMIN_ROLE);
		return IS_ADMIN_ROOT;
	}
	
}

/**
 * 判断当前管理员是否登录
 */
if ( ! function_exists('admin_logined')) {
	
	function admin_logined() {
		return read_cookie('current_admin_user_id',NULL) != NULL;
	}
	
}


if(!function_exists('admin_message')) {
	
	/**
	 * 
	 * 显示操作成功信息
	 * @param String $message 提示信息
	 * @param String $finish_url 完成URL
	 * @param int $seconds 秒数
	 * @param array $option_link 其他选择URL
	 */
	function admin_message($message,$finish_url,$seconds = 1,$option_link = array()) {
		$option_link = array_merge(array('返回'=>'javascript:window.history.go(-1)'),$option_link,array('完成'=>$finish_url));
		$page = new Page();
		$page->load->view('message',array('message'=>$message,'option_link'=>$option_link,'finish_url'=>$finish_url,'seconds'=>$seconds));
	}
	
}



if(!function_exists('write_admin_log')) {
	
	/**
	 * 插入操作信息
	 */
	function write_admin_log($content,$module = "sytstem",$admin="",$ip = "") {
		if($admin == "") {
			$admin = current_admin_user_name();
		}
		$ci = & get_instance();
		if($ip == "") {
			$ip = $ci->input->ip_address();
		}
		$ci->load->model("admin_log_model");
		return $ci->admin_log_model->add_admin_log($content,$module,$admin,$ip);
	}
	
}



if(!function_exists('write_login_log')) {
	/**
	 * 写入登录日志
	 */
	function write_login_log($login_user){
		$admin = $login_user['admin_name'];
		$ci = & get_instance();
		$ip = $ci->input->ip_address();
		$client = $ci->input->server('HTTP_USER_AGENT');
		$refer = $ci->input->server('HTTP_REFERER');
		$ci->load->model("login_log_model");
		return $ci->login_log_model->write_log($admin,$ip,$client,$refer);
	}
	
}


