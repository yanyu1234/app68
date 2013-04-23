<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 后台管理员主控制器
 * @author istrone
 */
class Admin extends Beta_Controller {
	
	public function _init(){
		if($this->request_method == 'index') {
			$this->layout = 'back_container';
		} else {
			$this->layout = 'back_item';
		}
	}
	
	public function index(){
		$this->assign_layout(array('selected_menu_index'=>'6','title'=>'管理员'));
	}
	
	public function llist() {
		$this->assign_layout(array('selected_menu_index'=>'6','title'=>'管理员'));
	}
	
	public function group() {
		$this->assign_layout(array('selected_menu_index'=>'6','title'=>'用户组'));
	}
 
}