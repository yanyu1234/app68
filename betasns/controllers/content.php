<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 后台内容管理主控制器
 * @author istrone
 */
class Content extends Beta_Controller {
	
	public function _init(){
		if($this->request_method == 'index') {
			$this->layout = 'back_container';
		} else {
			$this->layout = 'back_item';
		}
	}
	
	public function index(){
		$this->assign_layout(array('selected_menu_index'=>'3','title'=>'内容管理'));
	}

	public function diary(){
		$this->assign_layout(array('operate'=>array('内容管理','日志管理')));
	}
}