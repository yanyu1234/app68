<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 登录日志model
 * @author istrone
 */
class Login_log_model extends  Beta_Model {
	
	public function _init(){
		$this->table_name = "login_log";
		$this->tb_prefixt = "beta";
	}
	
	/**
	 * 写入登录日志
	 */
	public function write_log($admin,$ip,$client,$refer){
		$data = array(
			'login_admin'=>$admin,
			'login_ip'=>$ip,
			'login_client'=>$client,
			'login_refer'=>$refer,
			'login_time'=>time()
		);
		return $this->insert($data);
	}
	
}

