<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 计划任务入口
 * @author istrone
 */
class Cron extends Beta_Controller {

	private  $crons;
	
	private function _init_crons(){
		$this->load->model('cron_model');
		$cron_type = $this->request_method;
		$this->crons = $this->cron_model->crons_by_type($cron_type);
	}
	
	private function _cron_item($cron){
		$uri = $cron['uri'];
		if(substr($uri,0,4 ) != 'http') $uri = site_url($uri); 
		$request_method = $cron['request_method'];
		if($request_method == 'GET') $uri = $uri . '?' . $cron['cron_data'];
		$cron_data = parse_url($cron['cron_data']);
		$this->load->library('beta_http_client');
		$content = $this->beta_http_client->make_http_request($uri,$request_method,$cron_data);
		$return_code = $this->beta_http_client->get_http_code();
		log_message('DEBUG',sprintf("Cron HTTP REQUEST \n %s \n HTTP CODE IS %d\n",$content,$return_code));
	}
	
	public function hour(){
		$this->_init_crons();
		foreach ($this->crons as $cron) {
			$this->_cron_item($cron);
		}
		log_message('DEBUG',sprintf("Cron Hourly At:%s",date("Y-m-d H:i:s")));
	}
	
	public function day(){
		$this->_init_crons();
		foreach ($this->crons as $cron) {
			$this->_cron_item($cron);
		}
		log_message('DEBUG',sprintf("Cron Daily At:%s",date("Y-m-d H:i:s")));
	}
	
	public function week(){
		$this->_init_crons();
		foreach ($this->crons as $cron) {
			$this->_cron_item($cron); 
		}
		log_message('DEBUG',sprintf("Cron Weekly At:%s",date("Y-m-d H:i:s")));
	}
	
	public function month(){
		$this->_init_crons();
		foreach ($this->crons as $cron) {
			$this->_cron_item($cron);
		}
		log_message('DEBUG',sprintf("Cron Weekly At:%s",date("Y-m-d H:i:s")));
	}
	
}


/***
 * cron 的配置
 * 17 *    * * *   root    /usr/bin/php /home/istrone/outcode/svn/betasns/4/beta.php cron hour
 * 25 6    * * *   root    /usr/bin/php /home/istrone/outcode/svn/betasns/4/beta.php cron day
 * 47 6    * * 7   root    /usr/bin/php /home/istrone/outcode/svn/betasns/4/beta.php cron week 
 * 52 6    1 * *   root    /usr/bin/php /home/istrone/outcode/svn/betasns/4/beta.php cron month
 */