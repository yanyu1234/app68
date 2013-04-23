<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * 插件相关辅助函数
 */

if(!function_exists('beta_add_action')) {

	function beta_add_action(){
		$params = func_get_args();
		return call_user_func_array(array(_G("PL"),"add_action"), $params);
	}

}

if(!function_exists('beta_do_action')) {

	function beta_do_action(){
		$params = func_get_args();
		return call_user_func_array(array(_G("PL"),"do_action"), $params);
	}

}

if(!function_exists('beta_add_filter')) {

	function beta_add_filter(){
		$params = func_get_args();
		return call_user_func_array(array(_G("PL"),"add_filter"), $params);
	}

}

if(!function_exists('beta_apply_filter')) {

	function beta_apply_filter(){
		$params = func_get_args();
		return call_user_func_array(array(_G("PL"),"apply_action"), $params);
	}

}

