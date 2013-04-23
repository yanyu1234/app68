<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * betasns的工具类
 * @author istrone
 */
class Beta_tool {
	
	public function host() {
		return $_SERVER['SERVER_NAME'];
	}
	
	public function request_uri() {
		return $_SERVER['REQUEST_URI'];
	} 
	
	public function is_cli() {
		return (php_sapi_name() == 'cli') or defined('STDIN');
	}
	
 
	/**
	* 加密数据 
	* @param string $str 需要加密的字符串
	*/
	public function encrytData($str){
		for ($i = 0; $i < 32; $i++) {
			$str = $i%2 ? md5($str) : sha1($str);
		}
		return $str;
	}
	
	/**
	 * 清空cookie设置
	 */
	public function clear_cookie() {
		foreach ($_COOKIE as $k=>$v) {
			delete_cookie($k);
		}
	}
}