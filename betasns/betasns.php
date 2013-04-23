<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!defined('BETASNS_INCLUDED')) {
	define('BETASNS_INCLUDED', true);
} else {
	exit('No direct script access allowed');
}

/**
 * 自动加载器
 * 加载CI核心类以外的所有类库
 */
if(!function_exists('__autoload')) {
	function __autoload($name) {
		return (substr($name, 0,3) == "CI_");
	}
}

/**
 * import机制，主要用于加载betasns的内部类
 */
if(!function_exists('betasns_import')) {

	function betasns_import($name,$path = FALSE ,$beta_sns = TRUE){
		$f = $name . '.php';
		if($path != false) {
			$f = 'betasns/'.$path.'/'.$name . '.php';
		} 
		
		if(file_exists($f)) {
			require_once $f;
			return TRUE;
		}
		
		if(file_exists(strtolower($f))) {
			require_once strtolower($f);
			return TRUE;
		}
	}

}

/**
 * 控制器加载器
 * @author istrone
 */
class ControllerLoader {
	
	public function load($class_name) {
		if(!betasns_import($class_name,'core')){
			if(!betasns_import(APPPATH.'/core/'.$class_name)){
				betasns_import(APPPATH.'/controllers/'.$class_name);
			}
		}
	}
	
}

/**
 * 模型加载器
 * @author istrone
 */
class ModelLoader {
	public function load($class_name ){
		if(!betasns_import($class_name,'core')){
			$class_name = strtolower($class_name);
			if(!betasns_import(APPPATH.'/core/'.$class_name)){
				betasns_import(APPPATH.'/models/'.$class_name);
			}
		}
	}
}

/**
 * 类库加载器
 * @author istrone
 *
 */
class LibraryLoader {
	public function load($class_name) {
		$class_name = strtolower($class_name);
		betasns_import($class_name,'libraries');
	}
}

/**
 * 定义spl的自动加载
 */
spl_autoload_register('__autoload');
spl_autoload_register(array(new ControllerLoader(),'load'),false);
spl_autoload_register(array(new ModelLoader(),'load'),false);
spl_autoload_register(array(new LibraryLoader(),'load'),false);


