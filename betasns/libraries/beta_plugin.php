<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * betasns插件类
 * @author istrone
 */
class Beta_plugin {

	/**
	 * action 集合
	 * @var array
	 */
	public $actions;
	
	/**
	 * 过滤器集合
	 * @var array
	 */
	public $filters;
	
	/**
	 * 插件目录
	 * @var String
	 */
	private $plugin_dir;

	public   function __construct() {
		$this->actions = $this->filters = array();
		$this->plugin_dir = APPPATH . 'plugins/';
	}

	/**
	 * 初始化插件
	 */
	public function init(){
		$dir_handle = opendir($this->plugin_dir);
		while( $m = readdir($dir_handle)) {
			if($m == "." || $m == "..") {
				continue;
			} else {
				$n = $this->plugin_dir . $m;
				$PL_PATH = $this->plugin_dir ;
				if(is_file($n)) {
					$f = $n;
				}else{
					$PL_PATH = $this->plugin_dir . '/' . $n . '/' ;
					$f = $n . "/" . $m . ".php";
				}
				$PL = $this;
				$PL_URL = base_url() . $PL_PATH;
				include_once   $f;
			}
		}
		closedir($dir_handle);
	}

	/**
	 * 添加action
	 * @param String $action 事件名 
	 * @param mixed $callable 回调参数
	 * @param int $priority action优先级
	 */
	public function add_action($action,$callable,$priority = 0) {
		if(!isset($this->actions[$action])){
			$this->actions[$action] = new SplPriorityQueue();
		} 
		$splq = $this->actions[$action];
		$splq->insert($callable,$priority);
		$this->actions[$action] = $splq;
	}

	/**
	 * 完成一个动作
	 */
	public function do_action() {
		$args = func_get_args();
		$action = array_shift($args);
		$c = isset($this->actions[$action]) ? $this->actions[$action] : array();
		foreach ($c as $c) {
			if(is_callable($c)){
				if(!call_user_func_array($c, $args)){
					break;
				}
			}
		}
	}
	
	/**
	 * 添加一个过滤器
	 * @param String $filter 过滤器名
	 * @param mixed $callable 回调
	 * @param int $priority 优先级
	 */
	public function add_filter($filter,$callable,$priority = 0) {
		if(!isset($this->filters[$filter])){
			$this->filters[$filter] = new SplPriorityQueue();
		}
		$splq = $this->filters[$filter];
		$splq->insert($callable,$priority);
		$this->filters[$filter] = $splq;
	}

	/**
	 * 应用一个过滤器
	 */
	public function apply_filter() {
		$args = func_get_args();
		$filter = array_shift($args);
		$c = isset($this->filters[$filter]) ? $this->filters[$filter] : array();
		$tmp = NULL;
		if(!empty($c)) {
			foreach ($c as $c){
				if(is_callable($c)){
					$tmp = call_user_func_array($c, $args);
				}
			}
			return $tmp;
		} else {
			return array_shift($args);
		}
	}
}