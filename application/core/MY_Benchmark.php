<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 继承Benchmark
 * @author istrone
 */
class MY_Benchmark extends  CI_Benchmark {
	
	/**
	 * Benchmark是CI加载最早的一个类，在此类的构造函数中来导入betasns的引导文件，注册spl加载机制
	 */
	public function __construct() {
		include_once 'betasns/betasns.php';
	}
	
}