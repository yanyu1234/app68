<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Update_log_model extends Beta_Model {
	
	const MAX_SUBVERSION = 100 ;
	
	public function _init(){
		$this->table_name = "update_log";
		$this->tb_prefixt = "beta";
	}
	
	/**
	 * 添加管理员管理日志
	 */
	public function add_update_log($title,$content,$url="") {
		$insert_data = array(
			'title'=>$title,'content'=>$content,'url'=>$url,
		);
		$insert_data['addid'] = $insert_data['updateid'] = current_admin_user_id();
		$insert_data['addtime'] = $insert_data['updatetime'] = time();
		$max_sub_version = $this->get_max("sub_version");
		if($max_sub_version < self::MAX_SUBVERSION - 1 ) {
			$insert_data['sub_version'] = $max_sub_version + 1;
		} else {
			$max_main_version = $this->get_max("main_version");
			$insert_data['main_version'] = $max_main_version + 1;
			$insert_data['sub_version'] = 0;
		}
		return $this->insert($insert_data);
	}
	
	
	public function edit_update_log($id,$title,$content,$url=""){
		$update_data = array(
			'title'=>$title,'content'=>$content,'url'=>$url,
		);
		$update_data['updateid'] = current_admin_user_id();
		$update_data['updatetime'] = time();
		return $this->update_by_id($id, $update_data);
	}
	
	/**
	 * 获得更新日志
	 */
	public function update_log($offset,$limit) {
		return $this->get_items_offset($offset, $limit, array('`addtime` desc'));
	}
	
	
}
