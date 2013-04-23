<?php

/**
 * betasns的环境变量
 * @author istrone
 */
class Beta_env {
	
	public function set($k,$v = ""){
		if(is_array($k)) {
			foreach ($k as $m=>$n) {
				$_ENV[$m] = $n;
			}
		} else {
			$_ENV[$k] = $v;
		}
	}
	
	public function get($k){
		return $_ENV[$k];
	}
}