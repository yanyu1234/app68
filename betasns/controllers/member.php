<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 后台用户管理主控制器
 * @author istrone
 */
class Member extends Beta_Controller {
	
	public function _init(){
		if($this->request_method == 'index') {
			$this->layout = 'back_container';
		} else {
			$this->layout = 'back_item';
		}
	}
	
	public function index(){
		$this->assign_layout(array('selected_menu_index'=>'2','title'=>'用户'));
	}
	

	public function member_list() {
		$this->assign_layout('operate',array('用户','会员管理'));
	}
}