<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 系统变量
 * @author istrone
 */
class Env_model extends Beta_Model {
	
	public function _init(){
		$this->table_name = "env";
		$this->tb_prefixt = "beta";
	}
	
	public function envs($offset,$limit) {
		return $this->get_items_offset($offset, $limit, array('`updatetime` desc'));
	}
	
	public function add_env($name,$value) {
		$name = trim($name);
		if(	$item =	$this->get_item_where(array('name'=>$name))){
			return $this->edit_env($item['id'], $name, $value);
		}
	
		$insert_data = array(
			'name'=>$name,
			'value'=>$value
		);
		$insert_data['addid'] = $insert_data['updateid'] = current_admin_user_id();
		$insert_data['addtime'] = $insert_data['updatetime'] = time();
		return $this->insert($insert_data);
	}
	
	public function edit_env($id,$name,$value) {
		$name = trim($name);
		$update_data = array(
			'name'=>$name,
			'value'=>$value
		);
		$update_data['updateid'] = current_admin_user_id();
		$update_data['updatetime'] = time();
		return $this->update_by_id($id, $update_data);
	}
	
}