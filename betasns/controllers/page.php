<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 错误处理器
 * @author istrone
 */
class Page extends Beta_Controller {
	
	/**
	 * 错误处理
	 */
	public function error(){
		$this->load->view("error", array());
	}
	
}