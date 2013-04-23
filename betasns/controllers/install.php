<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Install extends Beta_Controller {

	public function __construct(){
		parent::__construct();
		$this->cache_request(10);
	}
	
	public function index() {
		$db['test']['hostname'] = "localhost";
		$db['test']['username'] = "qixingyue";
		$db['test']['password'] = "123456abc";
		$db['test']['database'] = "qixingyue_helloworld";
		$db['test']['dbdriver'] = "mysql";
		$db['test']['dbprefix'] = "";
		$db['test']['pconnect'] = TRUE;
		$db['test']['db_debug'] = FALSE;
		$db['test']['cache_on'] = FALSE;
		$db['test']['cachedir'] = "";
		$db['test']['char_set'] = "utf8";
		$db['test']['dbcollat'] = "utf8_general_ci";
		$db['test']['swap_pre'] = "";
		$db['test']['autoinit'] = TRUE;
		$db['test']['stricton'] = FALSE;
		$this->load->database($db['test']);
		//$this->load->dbforge();
		//$r = $this->dbforge->create_database('qixingyue_helloworld');
		$all_sql = file_get_contents('betasns/install_data/db.sql');
		$all_sql = preg_replace("/^--[^-]+$/i","",$all_sql);
		
		$sqls = explode(";\\r",$all_sql);
		
		foreach($sqls as $sql){
		
			if(str_replace(" ","",$sql)){
		
				$this->db->query($sql);
		
			}
		}
		$this->default_view = 'welcome_message';
	}

	/**
	 * 配置信息
	 */
	public function first() {
		
	}
	
	public function second() {
		
	}
	
	/**
	 * 安装完成
	 */
	public function finish() {
		
	}
	
	/**
	 * 安装数据库
	 */
	public function install_db() {
		
	} 
	
	
	/**
	 * 配置数据库
	 */
	public function configdb(){
		
	}
	
	/**
	 * 更改其他的配置文件，比如ueditor
	 */
	public function config_other_files() {
		
	}
}