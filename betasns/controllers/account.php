<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 帐号信息
 * @author istrone
 */
class Account extends Beta_Controller {
	
	public function _init(){
		if($this->request_method == 'index') {
			$this->layout = 'back_container';
		} else {
			$this->layout = 'back_item';
		}
		parent::_init();
	}
	
	public function index(){
		$this->assign_layout(array('selected_menu_index'=>'7','title'=>'帐号信息'));
	}

	/**
	 * 我的管理员信息
	 */
	public function myinfo(){
		$this->assign_layout('operate',array('帐号信息','个人信息'));
	}
	
	/**
	 * 修改密码
	 */
	public function updatepwd() {
		if($this->ispostback()) {
			$old_password = $this->input->post("password");
			$new_password = $this->input->post('new_password');
			$confirm_new_password = $this->input->post('confirm_new_password');
			if($new_password == $confirm_new_password) {
				$this->load->model('admin_model');
				if($this->admin_model->check_user(current_admin_user_name(),$old_password)) {
					if($this->admin_model->update_password(current_admin_user_id(),$new_password)) {
						return	admin_message("密码修改完成", site_url("account/updatepwd"));
					}
				}
				return	admin_message("旧密码错误", site_url("account/updatepwd"));
			} 
		}
		$this->assign_layout('operate',array('帐号信息','修改密码'));
	}
	
	public function checkpassword(){
		echo "false";
	}
}