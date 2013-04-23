<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Root extends Beta_Controller {
	
	public $layout = 'back_container';
	
	public function _init(){
		$this->needRoot = true;
		if($this->request_method == 'index') {
			$this->layout = 'back_container';
		} else {
			$this->layout = 'back_item';
		}
		parent::_init();
	}
	
	public function index() {
		$this->assign_layout(array('title'=>'ROOT相关','selected_menu_index'=>8));
	}
	
	//====================================================更新日志==========================================================================
	
	public function updatelog($offset=0) {
		$this->load->model('update_log_model');
		$limit = 10;
		$this->assign_layout(array('operate'=>array('ROOT相关','更新日志')));
		$this->assign('logs',$this->update_log_model->update_log($offset,$limit));
		$this->assign('count',$total = $this->update_log_model->total());
		$this->assign('pages',$this->create_pages(site_url('root/updatelog'),$total,$limit));
	}
	
	
	public function add_updatelog() {
		if($this->ispostback()) {
			$this->load->model('update_log_model');
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			$url = $this->input->post('url');
			if($this->update_log_model->add_update_log($title,$content,$url)) {
				write_admin_log("插入更新日志","ROOT相关");
				return	admin_message("您已经成功添加系统更新日志！", site_url("root/updatelog"));
			}
		}
		$this->assign_layout(array('operate'=>array('ROOT相关','添加日志')));
	}
	
	public function delete_update_log($id){
		if($this->is_ajax() && $this->ispostback()) {
			$this->load->model('update_log_model');
			if($this->update_log_model->delete_by_id($id)){
				write_admin_log("删除更新日志","ROOT相关");
			}
		}
		exit();
	}
	
	public function edit_update_log($id) {
		$this->load->model('update_log_model');
		$log = $this->update_log_model->get_item($id);
		if($this->ispostback()) {
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			$url = $this->input->post('url');
			if($this->update_log_model->edit_update_log($id,$title,$content,$url)) {
				write_admin_log("修改更新日志","ROOT相关");
				return	admin_message("您已经成功修改系统更新日志！", site_url("root/updatelog"));
			}
		}
		$this->assign('log',$log);
	}
	
	//====================================================权限日志==========================================================================
	
	public function right($offset = 0){
		$this->load->model('right_model');
		$limit = 10;
		$this->assign_layout(array('operate'=>array('ROOT相关','权限设置')));
		$this->assign('rights',$this->right_model->rights($offset,$limit));
		$this->assign('count',$total = $this->right_model->total());
		$this->assign('pages',$this->create_pages(site_url('root/right'),$total,$limit));
		
	}
	
	public function add_right(){
		if($this->ispostback()) {
			$this->load->model('right_model');
			$name = $this->input->post("name");
			$uri = $this->input->post("uri");
			$request_method = $this->input->post("request_method");
			$cancel = $this->input->post("cancel") != false;
			if($this->right_model->add_right($name,$uri,$request_method,$cancel)) {
				write_admin_log("添加权限","ROOT相关");
				return	admin_message("您已经成功加入权限！", site_url("root/right"));
			}
		}
		$this->assign_layout(array('operate'=>array('ROOT相关','权限设置')));
	}
	
	public function edit_right($id){
		$this->load->model('right_model');
		$right = $this->right_model->get_item($id);
		if($this->ispostback()) {
			$name = $this->input->post("name");
			$uri = $this->input->post("uri");
			$request_method = $this->input->post("request_method");
			$cancel = $this->input->post("cancel") != false;
			if($this->right_model->edit_right($id,$name,$uri,$request_method,$cancel)) {
				write_admin_log("修改权限","ROOT相关");
				return	admin_message("您已经成功修改权限！", site_url("root/right"));
			}
		}
		$this->assign('right',$right);
		$this->assign_layout(array('operate'=>array('ROOT相关','权限设置')));
	}
	
	public function delete_right($id){
		if($this->is_ajax() && $this->ispostback()) {
			$this->load->model('right_model');
			if($this->right_model->delete_by_id($id)){
				write_admin_log("删除权限","ROOT相关");
			}
		}
		exit();
	}
	
	//====================================================任务计划==========================================================================
	
	public function cron($offset = 0){
		$this->assign_layout(array('operate'=>array('ROOT相关','任务计划')));
		$this->load->model('cron_model');
		$limit = 10;
		$this->assign('crons',$this->cron_model->crons($offset,$limit));
		$this->assign('count',$total = $this->cron_model->total());
		$this->assign('pages',$this->create_pages(site_url('root/right'),$total,$limit));
	}
	
	public function add_cron(){
		if($this->ispostback()) {
			$this->load->model('cron_model');
			$uri = $this->input->post("uri");
			$request_method = $this->input->post("request_method");
			$cron_type = $this->input->post('cron_type');
			$cancel = $this->input->post("cancel") != false;
			$cron_data = $this->input->post("cron_data");
			if($this->cron_model->add_cron($uri,$request_method,$cron_type,$cancel,$cron_data)) {
				write_admin_log("添加CRON","ROOT相关");
				return	admin_message("您已经成功添加CRON！", site_url("root/cron"));
			}
		}
		$this->assign_layout(array('operate'=>array('ROOT相关','权限设置')));
	}
	
	public function edit_cron($id){
		$this->load->model('cron_model');
		$cron = $this->cron_model->get_item($id);
		if($this->ispostback()) {
			$uri = $this->input->post("uri");
			$request_method = $this->input->post("request_method");
			$cron_type = $this->input->post('cron_type');
			$cancel = $this->input->post("cancel") != false;
			$cron_data = $this->input->post("cron_data");
			if($this->cron_model->edit_cron($id,$uri,$request_method,$cron_type,$cancel,$cron_data)) {
				write_admin_log("修改CRON","ROOT相关");
				return	admin_message("您已经成功修改CRON！", site_url("root/cron"));
			}
		}
		$this->assign('cron',$cron);
		$this->assign_layout(array('operate'=>array('ROOT相关','权限设置')));
	}
	
	public function delete_cron($id){
		if($this->is_ajax() && $this->ispostback()) {
			$this->load->model('cron_model');
			if($this->cron_model->delete_by_id($id)){
				write_admin_log("删除CRON","ROOT相关");
			}
		}
		exit();
	}
	
	
	//====================================================系统变量==========================================================================
	
	public function env($offset = 0) {
		$this->assign_layout(array('operate'=>array('ROOT相关','系统变量')));
		$this->load->model('env_model');
		$limit = 10;
		$this->assign('envs',$this->env_model->envs($offset,$limit));
		$this->assign('count',$total = $this->env_model->total());
		$this->assign('pages',$this->create_pages(site_url('root/env'),$total,$limit));
	}

	public function add_env(){
		if($this->ispostback()) {
			$this->load->model('env_model');
			$name = $this->input->post("name");
			$value = $this->input->post("value");
			if($this->env_model->add_env($name,$value)) {
				write_admin_log("添加环境变量","ROOT相关");
				return	admin_message("您已经成功添加系统变量！", site_url("root/env"));
			}
		}
		$this->assign_layout(array('operate'=>array('ROOT相关','系统变量设置')));
	}
	
	public function edit_env($id){
		$this->load->model('env_model');
		$env = $this->env_model->get_item($id);
		if($this->ispostback()) {
			$name = $this->input->post("name");
			$value = $this->input->post("value");
			if($this->env_model->edit_env($id,$name,$value)) {
				write_admin_log("修改系统变量","ROOT相关");
				return	admin_message("您已经成功修改系统变量！", site_url("root/env"));
			}
		}
		$this->assign('env',$env);
		$this->assign_layout(array('operate'=>array('ROOT相关','系统变量设置')));
	}
	
	
	public function delete_env($id){
		if($this->is_ajax() && $this->ispostback()) {
			$this->load->model('env_model');
			if($this->env_model->delete_by_id($id)){
				write_admin_log("删除环境变量","ROOT相关");
			}
		}
		exit();
	}
	
}