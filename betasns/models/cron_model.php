<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_model extends Beta_Model {
	
	public function _init(){
		$this->table_name = "cron";
		$this->tb_prefixt = "beta";
	}
	
	public function crons_by_type($type){
		return	$this->get_items_where(array('cron_type'=>$type));
	}
	
	public function crons($offset,$limit) {
		return $this->get_items_offset($offset, $limit, array('`addtime` desc'));
	}
	
	public function add_cron($uri,$request_method,$cron_type,$cancel,$cron_data){
		$insert_data = array(
			'uri'=>$uri,
			'request_method'=>$request_method,
			'cron_type' => $cron_type,
			'cron_data'	=> $cron_data
		);
		$insert_data['cancel'] = $cancel ? 1 : 0;
		$insert_data['addid'] = $insert_data['updateid'] = current_admin_user_id();
		$insert_data['addtime'] = $insert_data['updatetime'] = time();
		return $this->insert($insert_data);
	}
	
	public function edit_cron($id,$uri,$request_method,$cron_type,$cancel,$cron_data) {
		$update_data = array(
			'uri'=>$uri,
			'request_method'=>$request_method,
			'cron_type' => $cron_type,
			'cron_data'	=> $cron_data
		);
		$update_data['cancel'] = $cancel ? 1 : 0;
		$update_data['updateid'] = current_admin_user_id();
		$update_data['updatetime'] = time();
		return $this->update_by_id($id, $update_data);
	}
}