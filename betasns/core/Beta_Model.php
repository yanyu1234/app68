<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * 公共的模型父类
 * @author istrone
 */
class Beta_Model extends CI_Model {
	
	public $table_name;
	public $tb_prefixt = '';
	public $primary_key = 'id';
	
	public function __construct(){
		parent::__construct();
		$this->_init();
	}
	
	/**
	 * 空实现
	 */
	public function _init(){}
	
	/**
	 * 默认前缀实现获得表的方法
	 */
	public function _table_name() {
		if($this->tb_prefixt == "") {
			return  $this->table_name;
		} else {
			return $this->tb_prefixt . "_" . $this->table_name;
		}
	}
	
	//======================================================查询类方法===========================================================================
	/**
	 * 获得一行记录
	 */
	public function get_item($id,$primary_key = 'id'){
		$this->load->database();
		$this->db->where($primary_key,$id);
		$item = $this->db->get($this->_table_name())->result_array();
		$this->db->close();
		return empty($item) ? array() : $item[0] ; 
	}
	
	public function get_item_where($where = "") {
		$items = $this->get_items_where($where);
		return empty($items) ? false : $items[0];
	}
	
	/**
	 * 根据简单的条件获得记录的集合,加入排序 
	 */
	public function get_items_offset($offset,$limit,$orderby=array(),$where = "") {
		$this->load->database();
		if($where != "" || ! empty($where)) {
			$this->db->where($where);
		}
		if(!empty($orderby))
			call_user_func_array(array($this->db,"order_by"), $orderby);
		$this->db->limit($limit,$offset);
		$items = $this->db->get($this->_table_name())->result_array();
		$this->db->close();
		return $items;
	}
	
	/**
	 * 根据简单的条件获得记录的集合 
	 */
	public function get_items_where($where = "") {
		$this->load->database();
		if($where != "" || ! empty($where)) {
			$this->db->where($where);
		}
		$items = $this->db->get($this->_table_name())->result_array();
		$this->db->close();
		return $items;
	}
	
	
	
	/**
	 * 获得最大的值 
	 */
	public function get_max($name,$where = "") {
		$this->load->database();
		if($where!="")$this->db->where($where);
		$this->db->select_max($name);
		$res = $this->db->get($this->_table_name())->result_array();
		$this->db->close();
		return isset($res[0][$name])?$res[0][$name] : 0;
	}
		
	/**
	 * 获取最大的一条记录
	 */
	public function get_max_item($orderby = array(),$where = "") {
		$this->load->database();
		if($where!="")$this->db->where($where);
		if(!empty($orderby))
			call_user_func_array(array($this->db,"order_by"), $orderby);
		$this->db->limit(1);
		$res = $this->db->get($this->_table_name())->result_array();
		$this->db->close();
		return empty($res) ? array() : $res[0];
	}
	
	/**
	 * 获得查询总数
	 */
	public function total($where=""){
		$this->load->database();
		if($where!="")$this->db->where($where);
		$total = $this->db->count_all_results($this->_table_name());
		$this->db->close();
		return $total;
	}
	
	//======================================================更新类方法===========================================================================

	public function update_by_id($id,$data,$return_affect_rows = false) {
		$this->load->database();
		$this->db->where($this->primary_key,$id);
		$res = $this->db->update($this->_table_name(),$data);
		if($return_affect_rows) {
			$res = $this->db->affected_rows();
		}
		$this->db->close();
		return $res;
	}
	
	//======================================================插入类方法===========================================================================
	
	public function insert($data,$return_last_id = false) {
		$this->load->database();
		$res = $this->db->insert($this->_table_name(),$data);
		if($return_last_id) {
			$res = $this->db->insert_id();
		}
		$this->db->close();
		return $res;
	}
	
	//======================================================删除类方法===========================================================================
	
	public function delete_by_id($id) {
		$this->load->database();
		$res =	$this->db->delete($this->_table_name(),array($this->primary_key=>$id));
		$this->db->close();
		return $res;
	}
}