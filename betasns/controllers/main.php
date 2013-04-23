<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 后台管理主控制器
 * @author istrone
 */
class Main extends Beta_Controller {
	
	/**
	 * 登录入口
	 */
	public function login() {
		if($this->ispostback()) {
			$this->load->library('beta_vc');
			$this->load->model("admin_model");
			$code = $this->input->post("admincode");
			if($this->beta_vc->checkcode($code)){
				$username = $this->input->post('adminusername',true);
				$userpassword = $this->input->post('adminpassword',true);
				if($current_user = $this->admin_model->check_user($username,$userpassword,true)) {
					write_login_log($current_user);
					beta_do_action("admin_logined",$current_user);
					return $this->jump_me();
				}
			}
		}
		$this->load->view('login');
	}
	
	/**
	 * 管理中心主页
	 */
	public function index() {
		$this->layout = "back_container";
		$this->assign_layout(array('title'=>'betasns管理中心首页','selected_menu_index'=>0));
		
		$this->load->lay_out_view('index');
	}
	
	/**
	 * 欢迎的主iframe 
	 */
	public function welcome() {
		$this->load->view('welcome');
	}
	
	/**
	 * 快捷菜单
	 */
	public function shortcut(){
		
	}
	
	/**
	 * 退出当前用户登录
	 */
	public function logout() {
		$this->load->library("beta_tool");
		$this->beta_tool->clear_cookie();
		$this->jump_me('login');
	}
	
	
	/**
	 * 输出验证码
	 */
	public function code() {
		$this->load->library('beta_vc');
		ob_start();
		$this->beta_vc->renderimg();
	}
	
	public function js(){
		$this->set_content_type('js');
	}
}