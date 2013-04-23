<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * 公共控制器的核心
 */
class Beta_Controller extends CI_Controller {
	
	/**
	 * 是否需要ROOT权限
	 * @var Boolean
	 */
	public $needRoot = false;
	
	/**
	 * 是否启用layout布局，默认启用
	 * @var Boolean
	 */
	public $enable_layout = true;
	
	/**
	 * layout的名字
	 * @var String
	 */
	public $layout = 'default';
	
	/**
	 * 传递给layout的变量 
	 * @var array
	 */
	public $layout_data = array();
	
	/**
	 * 给assign方法应用，同时外部的插件代码可以通过assign向视图注入数据
	 * @var Array
	 */
	public $assign_data = array();
	
	/**
	 * 自定义Loader
	 * @var Beta_Loader
	 */
	public $load;
	
	/**
	 * 默认视图
	 * @var String
	 */
	protected $default_view = FALSE;
	
	/**
	 * 插件对象
	 * @var Betasns_plugin
	 */
	public  $plugin;
	
	/**
	 * 是否已经渲染视图
	 */
	protected $rendered = FALSE;
	
	/**
	 * 请求的方法
	 */
	protected $request_method ;
	
	/**
	 * 
	 * @var CI_Input
	 */
	public $input;
	/**
	 * 设置请求的方法
	 */
	public function set_request_method($method_name) {
		$this->request_method = $method_name;
	}
	
	/**
	 * 读取请求的方法
	 */
	public function request_method() {
		return $this->request_method;
	}
	
	/**
	 * 读取视图是否渲染
	 */
	public function rendered() {
		return $this->rendered;
	}
	
	/**
	 * 设置是否渲染
	 * @param Boolean $f 是否渲染
	 */
	public function set_rendered( $f = true) {
		$this->rendered = $f;
	}
	
	public function render_default(){
		$view_name = $this->request_method;
		if(!$this->load->view_exist($view_name)){
			$view_name = "";	
		}
		$this->load->lay_out_view($view_name);
	}
	
	/**
	 * 默认视图
	 */
	public function default_view(){
		return $this->default_view ? $this->default_view : $this->request_method;
	}
	
	/**
	 * 设置缓存时间
	 */
	public function cache_request($seconds) {
		$this->output->cache($seconds/60);
	}
	
	/**
	 * 清理缓存
	 */
	public function clean_cache(){
		$this->load->driver('cache');
		$this->cache->file->clean();
	}
	
	public function __construct(){
		parent::__construct();
		$this->load->set_current_controller($this);
		header('Content-type:text/html;charset=utf-8');
	}
	
	/**
	 * 控制器初始化方法
	 */
	public function _init() {
		if($this->needRoot && !admin_is_root()) {
			//整个控制器需要ROOT权限，但是用户没有ROOT权限
			echo "没有ROOT权限！";
			exit();
		}	
	}
	
	/**
	 * 默认的输出函数
	 * @param String $content
	 */
	public function _output($content) {
		echo $content;
	}
	
	/**
	 * 设置返回的类型
	 * @param String $type
	 */
	public function set_content_type($type = 'html') {
		$this->output->set_content_type($type);
	}
	
	/**
	 * 绑定数据
	 * @param string $k 视图中读取的名字
	 * @param mixed $v 绑定的数据
	 */
	public function assign($k,$v = NULL){
		if(is_array($k)) {
			foreach ($k as $m=>$n) {
				$this->assign_data[$m] = $n;
			}
		} else {
			$this->assign_data[$k] = $v;
		}
	}
	
	/**
	 * 设置layout变量 
	 */
	public function assign_layout($k,$v=NULL){
		if(is_array($k)) {
			foreach ($k as $m=>$n) {
				$this->layout_data[$m] = $n;
			}
		} else {
			$this->layout_data[$k] = $v;
		}
	}
	
	/**
	 * 绑定从模型来的数据
	 * @param String $model_name 模型名
	 * @param String $method_name 方法名
	 * @param String $diaplay_name 显示名
	 */
	public function bind_model_data($model_name,$method_name,$diaplay_name) {
		$params = func_get_args();
		for($i=0;$i<3;$i++) array_shift($params);
		$this->load->model($model_name);
		if(method_exists($this->$model_name, $method_name)) {
			$data = call_user_func_array(array($this->$model_name,$method_name), $params);
			$this->assign($diaplay_name, $data);
			return $data;
		}
	}
	
	/**
	 * 表单是否提交
	 */
	public function ispostback() {
		return !(empty($_GET) && empty($_POST));
	}
	
	/**
	 * 判断请求类型是否是AJAX类型
	 */
	public function is_ajax() {
		return $this->input->is_ajax_request();
	}

	/**
	 * 判断请求类型，是否是cli请求 
	 */	
	public function is_cli() {
		return $this->input->is_cli_request();
	}
	
	/**
	 * URL跳转，服务器端用header头跳转,默认301跳转
	 * @param String $uri 跳转的URL
	 * @param boolean $needCI 是否需要CI的site_url帮助跳转
	 * @param int 跳转码，默认301跳转
	 */
	public function jump($uri,$needCI = true,$redirec_code = 301) {
		ob_start();
		if(!function_exists('redirect')) $this->load->helper('url');
		if($needCI) $uri = site_url($uri);
		redirect($uri,'location',$redirec_code);
	}
	
	/**
	 * 控制器内的跳转
	 * @param string $method 方法的名称
	 */
	public function jump_me($method = "",$redirec_code = 301){
		ob_start();
		$uri = site_url( strtolower(get_class($this) . '/' . $method));
		if(!function_exists('redirect')) $this->load->helper('url');
		redirect($uri,'location',$redirec_code);
	}
	
	
	
	/**
	 * 为防止重复攻击每个表单加了一个重复随机的验证token
	 * @var String token的名字
	 */
	const form_token_name = 'beta_form_token';
	
	/**
	 * 产生一个form_token
	 */
	public function form_token($token_name = self::form_token_name){
		return $_SESSION[$token_name] = md5(uniqid());
	}
	
	/**
	 * 检查token 是否正确 
	 * @param String $token_name  form的token的名字
	 */
	public function token_valid($token_name = self::form_token_name) {
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			return $_GET[$token_name] == $_SESSION[self::form_token_name];
		} else {
			return $_POST[$token_name] == $_SESSION[self::form_token_name];
		}
	}
	
	/**
	 * 创建分页的HTML
	 */
	public function create_pages($baseUrl,$total,$limit=-1,$segement=3){
		$limit = $limit == -1 ? config_item('page_limit') : $limit;
		$this->load->library('pagination');
		$config['num_links'] = 6;
		$config['uri_segment'] = $segement;
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['base_url'] = $baseUrl;
		$config['total_rows'] = $total;
		$config['per_page'] = $limit ;
		$config['cur_tag_open'] = '<a class="active">';
		$config['cur_tag_close'] = '</a>';
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
}