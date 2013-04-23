<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * betasns安装类
 * @author istrone
 */
class Beta_install {

	public $install_file = '.beta.install.ini';
	
	/**
	 * 判断是否安装，用一个.beta.install.ini来标记是否安装
	 */
	public function installed() {
		
		if(file_exists($this->install_file)){
			$d = parse_ini_file($this->install_file);
			return $d;
		}
		
	}
	
	/**
	 * 未安装跳转
	 */
	public function install_jump() {
		$btt = new Beta_tool();
		$uri = $btt->request_uri();
		if(!preg_match('#/beta/install/.*#', $uri) && $uri != '/beta/shell') {
			header('Location:http://'. $btt->host(). '/beta/install/');
			exit();
		}
	}
	
}