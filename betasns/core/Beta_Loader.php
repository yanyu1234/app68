<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 加载器
 * @author istrone
 */
class Beta_Loader extends CI_Loader {
	
	/**
	 * 默认启用beta,视图布局和主题设置
	 * @var Boolean
	 */
	public $enable_beta = TRUE;
	
	/**
	 * view 文件的路径
	 * @var String
	 */
	public $view_path = "";
	
	/**
	 * 当前控制器
	 * @var Beta_Controller
	 */
	private  $current_controller ;
	
	public function __construct(){
		parent::__construct();
		$this->_ci_library_paths = array_merge($this->_ci_library_paths,array('betasns/'));
		$this->_ci_helper_paths = array_merge($this->_ci_helper_paths,array('betasns/'));
		$this->_ci_model_paths = array_merge($this->_ci_model_paths,array('betasns/'));
		$this->view_path = APPPATH . 'views/' . (config_item('current_theme') != '' ? config_item('current_theme') : 'default');
	}
	
	
	/**
	 * 覆盖父类的view函数，添加主题支持，和类加载
	 * (non-PHPdoc)
	 * @see CI_Loader::view()
	 */
	public function view($view,$vars=array(),$return = FALSE) {
		$vars = array_merge($vars,$this->current_controller->assign_data);	
		if($this->enable_beta) {
			$view = current_theme() . '/' . strtolower(get_class($this->current_controller)) . '/' . $view;
		}
		$this->current_controller->set_rendered();
		return parent::view($view,$vars,$return);
	}
	
	/**
	 * 加载具体的视图
	 */
	public function specific_view($view_file,$vars = array(),$return = false) {
		$this->current_controller->set_rendered();
		return parent::view(current_theme() . '/' . $view_file,$vars,$return);
	}
	
	/**
	 * 关闭主题支持和视图布局
	 */
	public function disable_theme() {
		$this->enable_themed = FALSE;
	}
	
	/**
	 * 设置当前的控制器
	 * @param MY_Controller $ci
	 */
	public function set_current_controller($ci) {
		$this->current_controller = $ci;
	}
	
	/**
	 * 加载布局的视图
	 */
	public function lay_out_view($view_name = "",$params = array(), $layout_name = false,$return = false) {
		$ci = & get_instance();
		if($layout_name == false) {
			$layout_name = $ci->layout;
		}
		if($view_name != "") {
			$content = $this->view($view_name, $params,true);	
		} else {
			$content = "";
		}
		
		$lay_out_name = current_theme() . '/layouts/'.$layout_name; 
		$layout_data = array('content'=>$content);
		$layout_data = array_merge($layout_data,$ci->layout_data);
		$this->current_controller->set_rendered();
		return parent::view($lay_out_name, $layout_data ,$return);
	}
	
	/**
	 * 是否存在layout
	 * @param String $layout_name
	 */
	public function lay_out_exist($layout_name) {
		$layout_file_path = $this->view_path . 'layouts/' . $layout_name . '.php';
		return file_exists($layout_file_path);
	}
	
	/**
	 * 是否存在指定视图
	 * @param String $view_name 视图的名字
	 * @param String $controller_name 控制器的名字
	 */
	public function view_exist($view_name,$controller_name = '') {
		if($controller_name == '') $controller_name = strtolower(get_class($this->current_controller)) ;
		$view_file_path = $this->view_path . '/'.$controller_name . '/' . $view_name . '.php';
		return file_exists($view_file_path);
	}
}