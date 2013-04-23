<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Right_model extends Beta_Model {
	
	public function _init(){
		$this->table_name = "right";
		$this->tb_prefixt = "beta";
	}
	
	public function rights($offset,$limit) {
		return $this->get_items_offset($offset, $limit, array('`addtime` desc'));
	}
	
	public function add_right($name,$uri,$request_method,$cancel){
		$insert_data = array(
			'right_name'=>$name,
			'uri'=>$uri,
			'request_method'=>$request_method,
		);
		$insert_data['cancel'] = $cancel ? 1 : 0;
		$insert_data['addid'] = $insert_data['updateid'] = current_admin_user_id();
		$insert_data['addtime'] = $insert_data['updatetime'] = time();
		return $this->insert($insert_data);
	}
	
	public function edit_right($id,$name,$uri,$request_method,$cancel) {
		$update_data =  array(
			'right_name'=>$name,
			'uri'=>$uri,
			'request_method'=>$request_method,
		);
		$update_data['cancel'] = $cancel ? 1 : 0;
		$update_data['updateid'] = current_admin_user_id();
		$update_data['updatetime'] = time();
		return $this->update_by_id($id, $update_data);
	}
}