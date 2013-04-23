<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 管理员模型
 * @author istrone
 */
class Admin_model extends Beta_Model {

	public function _init(){
		$this->table_name = "admin";
		$this->tb_prefixt = "beta";
	}
	
	/**
	 * 检查用户名密码
	 */
	public function check_user($admin_name,$admin_password) {
		$this->load->library('beta_tool');
		$admin_password = $this->beta_tool->encrytData($admin_password);
		$users = $this->get_items_where(array('admin_name'=>$admin_name,'admin_password'=>$admin_password));
		return empty($users) ? false : $users[0];
	}
	
	/**
	 *  更新最近登录时间
	 */
	public function update_login_time($userid) {
		$rows = $this->update_by_id($userid, array('last_login_time'=>time()),true);
		return $rows == 1;
	}
	
	/**
	 * 修改密码
	 */
	public function update_password($userid,$new_password) {
		$this->load->library('beta_tool');
		$rows = $this->update_by_id($userid, array('admin_password'=>$this->beta_tool->encrytData($new_password)),true);
		return $rows == 1;
	}
}