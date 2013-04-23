<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 资源管理主控制器
 * @author istrone
 */
class Resource extends Beta_Controller {
	
	public function _init(){
		if($this->request_method == 'index') {
			$this->layout = 'back_container';
		} else {
			$this->layout = 'back_item';
		}
	}
	
	public function index(){
		$this->assign_layout(array('selected_menu_index'=>'4','title'=>'资源管理'));
	}
	
	public function area(){
		$this->assign_layout('operate',array('资源管理','区域管理'));
	}
	
}