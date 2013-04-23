<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 外部的模型  
 * @author istrone
 */
class Out_Model extends CI_Model {

	/**
	 * 外部默认的URL
	 * @var String
	 */
	public $default_out_url;
	
	/**
	 * 外部模型的名字 
	 * @var String
	 */
	public $_model_name;
	
	public function __construct(){
		$this->default_out_url = config_item('default_out_url');	
	}
	
	/**
	 * 设置外部模型的名字
	 * @param String $model_name
	 */
	public function set_model($model_name) {
		$this->_model_name = $model_name;
	}
	
	/**
	 * 调用外部模型的名字
	 * @param String $method_name 模型的名字
	 * @param Array $params 传递的模型 
	 * @param Int $cached_time 缓存的时间
	 */
	public function call_method($method_name,$params = array(),$cached_time = FALSE) {
			
	}
	
}