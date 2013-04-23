<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class H {
	
	private function get_ci() {
		if(class_exists('CI_Controller')) {
			return get_instance();
		}
	}
	
	public function pre_system() {
		session_start();
		$this->_tsns(__METHOD__);
	}
	
	public function pre_controller() {
		$this->_tsns(__METHOD__);
	}
	
	public function post_controller_constructor() {
		$ci = & get_instance();
		$ci->load->helper('admin');	//先加载admin辅助函数
		$this->_tsns(__METHOD__);
		if(admin_logined()) {
			return ;	
		}
		$login_url = site_url('main/login');
		$uri = trim( $ci->uri->uri_string,'/');
		if($uri != "main/login" && $uri != "main/code") {
			header("Location:".$login_url);	
		}
	}
	
	public function post_controller() {
		$this->_tsns(__METHOD__);
	}
	
	public function display_override() {
		if(!$this->_tsns(__METHOD__)){
			$this->get_ci()->output->_display();
		}
	}
	
	public function cache_override() {
		$this->_tsns(__METHOD__);
	}
	
	public function post_system() {
		$this->_tsns(__METHOD__);
	}
	
	/**
	 * 两个Hook类之间的通信，如果返回false，那么停止本类的调用
	 */
	private function _tsns($name) {
		$name = 'beta_sns_' . substr($name, strlen('H::'));
		$betasns_hook = new Beta_hook();
		return $betasns_hook->$name();	
	}
}