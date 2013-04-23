<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * betasns升级文件
 * @author istrone
 */
class Beta_update {

	public $update_url  = 'http://127.0.0.1/updates/a.zip';
	public $update_path = './tmp/update/';
	public $web_root_path = APPPATH;
	public $extract_path = './tmp/update/';
	
	public function main() {
		$zip_file =	$this->down_load_file($this->update_url, $this->update_path);
		$this->extract_zip($zip_file,$this->extract_path);
		$this->execute_update($this->extract_path . "a/index.php",$this->web_root_path);
		unlink($zip_file);
	}
	
	public function update_from_zip($zip_file) {
		$this->extract_zip($zip_file, $this->extract_path);
		$this->execute_update($this->extract_path . "a/index.php", $this->web_root_path);
		unlink($zip_file);
	}
	
	public function down_load_file($url,$path) {
		$handle = curl_init($url);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER , true);
		$data = curl_exec($handle);
		$i = strrpos($url, "/");
		$name = substr($url, $i+1);
		file_put_contents($path . $name, $data);
		return $path.$name;
	}
	
	public function extract_zip($zip_file,$extract_path){
		$zip = new ZipArchive();
		$rs = $zip->open($zip_file);
		$zip->extractTo($extract_path);
		$zip->close();
	}
	
	public function execute_update($update_file,$web_root_path) {
		include $update_file;
		$uc = new Update_Client();
		$uc->update($web_root_path);
	}
	
}
