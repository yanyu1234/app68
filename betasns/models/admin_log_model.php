<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_log_model extends Beta_Model {
	
	public function _init(){
		$this->table_name = "admin_log";
		$this->tb_prefixt = "beta";
	}
	
	/**
	 * 添加管理员管理日志
	 */
	public function add_admin_log($content,$module ,$admin,$ip) {
		$data = array(
				"operate_content"=>$content,
				"operate_module"=>$module,
				"operate_admin"=>$admin,
				"operate_ip"=>$ip,
				"operate_time"=>time()
		);
		return $this->insert($data);
	}
	
	
}
