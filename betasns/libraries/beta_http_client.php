<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * http请求的客户端
 * @author istrone
 */
class Beta_http_client {
	
	private $http_return_code = -1;
	
	public function __construct(){
		
	}
	
	public function before_request() {
		
	}
	
	public function after_request() {
		
	}
	
	public function set_addtion_headers() {
		
	}
	
	public function send_request() {
		
	}
	
	public function send_get() {
		
	}
	
	public function send_post() {
		
	}
	
	public function send_simple_get() {
		
	}
	
	public function make_http_request($url,$method,$data = array(),$cookie = array(),$header = array()){
		$ch_handle = curl_init($url);
		curl_setopt($ch_handle, CURLOPT_RETURNTRANSFER, true);
		if($method == 'POST') {
			curl_setopt($ch_handle, CURLOPT_POST, true);
			curl_setopt($ch_handle, CURLOPT_POSTFIELDS, $data);
		} 
		if(!empty($cookie)) curl_setopt($ch_handle, CURLOPT_COOKIE, $cookies);
		if(!empty($header))	curl_setopt($ch_handle, CURLOPT_HTTPHEADER, $header);
		$content = curl_exec($ch_handle);
		$this->http_return_code = curl_getinfo($ch_handle,CURLINFO_HTTP_CODE);
		curl_close($ch_handle);
		return $content;
	}
	
	public function get_http_code() {
		return $this->http_return_code;
	}
}