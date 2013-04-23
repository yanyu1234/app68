<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 后台门户主控制器
 * @author istrone
 */
class Portal extends Beta_Controller {
	
	public function _init(){
		if($this->request_method == 'index') {
			$this->layout = 'back_container';
		} else {
			$this->layout = 'back_item';
		}
	}
	
	public function index(){
		$this->assign_layout(array('selected_menu_index'=>'1','title'=>'门户管理'));
	}
	
	public function channel(){
		$this->assign_layout('operate',array('门户管理','频道管理'));
	}
	
}