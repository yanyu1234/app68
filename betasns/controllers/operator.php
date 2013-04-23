<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 后台运营管理主控制器
 * @author istrone
 */
class Operator extends Beta_Controller {
	
	public function _init(){
		if($this->request_method == 'index') {
			$this->layout = 'back_container';
		} else {
			$this->layout = 'back_item';
		}
	}
	
	public function index(){
		$this->assign_layout(array('selected_menu_index'=>'5','title'=>'运营管理'));
	}
	
	public function pagelist(){
		
	}
	
	public function common_value(){
		
	}
	
	public function seo(){
		
	}
}