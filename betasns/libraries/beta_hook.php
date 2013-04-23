<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * 集成CI的钩子的所有的功能，可以在这个类里添加
 * @author istrone
 */
class Beta_hook {
	
	/**
	 * 默认的钩子调用
	 */
	public function beta_sns_pre_system(){
		$this->install();
	}

	public function beta_sns_pre_controller(){
		
	}

	public function beta_sns_post_controller_constructor(){
		$ci = & get_instance();
		$router = $ci->router;
		$ci->set_request_method($router->fetch_method());
		$this->load_sth($ci);
		if(method_exists($ci, '_init')) {
			$ci->_init();
		}
	}

	public function beta_sns_post_controller(){
		$ci = & get_instance();
		if(!$ci->rendered()) $ci->render_default();
	}

	public function beta_sns_display_override(){

	}

	public function beta_sns_cache_override(){

	}

	public function beta_sns_post_system(){

	}

	/**
	 * 加载一些东西
	 * @param MY_Controller $ci 控制器类
	 */
	protected  function load_sth($ci) {
		$ci->load->config('beta_config');
		$ci->load->helper(array('beta_common','beta_plugin','beta_theme','url','cookie','form'));
		$ci->load->library('beta_plugin',array(),'plugin');
		_G("PL",$ci->plugin);
		_G("PL")->init();
	}
	
	/**
	 * 安装跳转
	 */
	protected function install(){
		$bi = new Beta_install();
		if(!$bi->installed()) {
			$bi->install_jump();
		}
	}
}