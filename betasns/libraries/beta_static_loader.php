<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * 静态资源加载器
 * @author istrone
 */
class Beta_static_loader {
	
	private static  $instance;
	
	/**
	 * 已经加载的css文件
	 */
	private $loaded_css = array();
	
	/**
	 * 已经加载的js文件
	 */
	private $loaded_js = array();
	
	/**
	 * 已经加载的库
	 */
	private $loaded_lib = array();
	
	/**
	 * 静态资源的起始URL，方便启用CDN加速
	 */
	private $static_url = '';
	
	public static function get_instance () {
		if(!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	
	private  function __construct(){
		if(config_item('static_url') != '') {
			$this->static_url = config_item('static_url');
		} else {
			$this->static_url = base_url() . 'static/';
		}
	}
	
	/**
	 * 加载多个css文件，用,隔开
	 */
	public function load_css($css) {
		$css = explode(',', $css);
		foreach ($css as $c) {
			$this->_load_css($c);
		}
	}
	
	/**
	 * 加载单一的css文件
	 */
	private function _load_css($css_item){
		
		if(!in_array($css_item,$this->loaded_css)) {
			$url = $this->static_url. current_theme() . '/css/' . $css_item . '.css';
			echo '<link href="'.$url.'" rel="stylesheet" type="text/css">';
			$this->loaded_css[] = $css_item;
		}
	}
	
	/**
	 * 加载js文件，用,隔开
	 */
	public function load_js($js){
		$js = explode(',', $js);
		foreach ($js as $j) {
			$this->_load_js($j);
		}
	}
	
	/**
	 * 加载单一的js文件
	 */
	private function _load_js($js_item) {
		if(!in_array($js_item,$this->loaded_js)) {
			$url = $this->static_url . current_theme() . '/js/' . $js_item . '.js';
			echo '<script src="'.$url.'" type="text/javascript"></script>';
			$this->loaded_js[] = $js_item;
		}
	}
	
	/**
	 * 加载静态的lib,分发相关的库
	 */
	public function load_lib($name,$other = "") {
		$m = 'load_lib_'.$name;
		$this->$m($other);
	}
	
	/**
	 * 加载jquery
	 */
	public function load_lib_jquery() {
		if(!in_array('jquery', $this->loaded_lib)) {
			$url = $this->static_url . '/lib/js/jquery.js';
			echo '<script src="'.$url.'" type="text/javascript"></script>';
			$this->loaded_lib[] = 'jquery';
		}
	}
	
	/**
	 * 加载jui
	 */
	public function load_lib_jui() {
		if(!in_array('jui', $this->loaded_lib)) {
			$url = $this->static_url . '/lib/js/jquery-ui-1.8.24.custom.min.js';
			echo '<script src="'.$url.'" type="text/javascript"></script>';
			$this->loaded_lib[] = 'jui';
		}
	}
	
	/**
	 * 加载bootstrap基本的文件
	 */
	public function load_lib_bootstrap() {
		if(!in_array('bootstrap', $this->loaded_lib)) {
			                     
			$url = $this->static_url . '/lib/bootstrap/css/bootstrap.min.css';
			echo '<link href="'.$url.'"  rel="stylesheet"/>';
			
			$url = $this->static_url . '/lib/bootstrap/js/bootstrap.min.js';
			echo '<script src="'.$url.'" type="text/javascript"></script>';
			
			$this->loaded_lib[] = 'bootstrap';
		}
	}
	
	 /**
	 * 加载jquery 验证插件
	 */
	public function load_lib_jquery_validate() {
		if(!in_array('jquery_validate', $this->loaded_lib)) {
			$url = $this->static_url . '/lib/js/jquery.validate.min.js';
			echo '<script src="'.$url.'" type="text/javascript"></script>';
			$url = $this->static_url . '/lib/js/jquery.validate.message.js';
			echo '<script src="'.$url.'" type="text/javascript"></script>';
			$this->loaded_lib[] = 'jquery_validate';
		}
	}
	
	/**
	 * 加载静态图片，和主题相关的图片，非用户上传的图片
	 */
	public function make_static_url($name) {
		return	$this->static_url. current_theme() . '/images/' . $name;
	}
}
