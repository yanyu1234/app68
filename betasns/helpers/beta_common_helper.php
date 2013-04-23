<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * 全局读写函数封装，在任何地方都可以调用
 */
if(!function_exists('_G')) {

	function _G($name,$value = NULL){
		if(!isset($GLOBALS['BETASNS_G'])) {
			$GLOBALS['BETASNS_G'] = array();
		}
		$G = $GLOBALS['BETASNS_G'];
		if ($value == NULL) {
			return isset($G[$name]) ?  $G[$name] : NULL;
		} else {
			$G[$name] = $value;
			$GLOBALS['BETASNS_G'] = $G;
		}
	}

}

/**
 * 是否安装了betasns
 */
if(!function_exists('betasns_installed')) {

	function betasns_installed(){
		$m = new Betasns_install();
		return $m->installed();
	}

}


/**
 * 对外启用API调用的函数
 */
if(!function_exists('beta_api_get')) {

	function beta_api_get($api_name,$params=array(),$url="",$enable_time = false){

		if($enable_time !== false) {
			//加入缓存优化
			$ci = get_instance();
			$ci->load->driver('cache');
			$hash = $api_name . implode('_', $params) . $url;
			$hash = preg_replace(array("/\//","/:/","/\./"),"", $hash);
			if( $data = $ci->cache->file->get($hash)) {
				return $data;
			}
		}
		if($url == "") $url = config_item('_t_api_url');
		$d['api_name'] = $api_name;
		$d['params']= '';
		foreach ($params as $k=>$p)
			$d['params['.$k.']'] = $p;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $d);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$content = curl_exec($ch);
		if(_G("t_debug")) {
			echo $content;
		}
		$data = json_decode($content);
		if($enable_time !== false) {
			//加入缓存优化
			if($ci->cache->file->save($hash,$data,$enable_time)) {
				return $data;
			}
		}
		return $data;
	}

}

if(!function_exists('beta_get_model')) {
	
	function beta_get_model($model_name) {
		$ci = get_instance();
		$ci->load->model($model_name);
		return $ci->$model_name; 
	}
	
}

if(!function_exists('read_cookie')) {
	
	function read_cookie($cookie_name,$default = NULL) {
		return isset($_COOKIE[$cookie_name]) ? $_COOKIE[$cookie_name] : $default; 
	}
}

/**
 * 禁止使用iframe单独打开的js脚本
 */
if(!function_exists('forbidden_iframe_js')) {
	function forbidden_iframe_js($error_url){
		echo <<<JAVASCRIPT
<script type="text/javascript">if(window == top) window.location.href="$error_url";</script>
JAVASCRIPT
;
	}
}