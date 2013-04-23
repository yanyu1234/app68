<?php  if ( ! defined('BETASNS_INCLUDED')) exit('No direct script access allowed');

/**
 * betasns 主题相关函数
 */


/**
 * 获得当前的主题，默认为default
 */
if(!function_exists('current_theme')) {

	function current_theme(){
		 return config_item('current_theme') != '' ? config_item('current_theme') : 'default';
	}

}


if(!function_exists('the_diary')) {
	
	function the_diary() {
		
	}
	
}

if(!function_exists('static_loader')) {
	
	function static_loader(){
		return Beta_static_loader::get_instance(); 
	}
	
}

if(!function_exists('load_css')) {
	
	function load_css($csses){
		static_loader()->load_css($csses);
	}
	
}

if(!function_exists('load_js')) {
	
	function load_js($jses) {
		static_loader()->load_js($jses);
	}
	
}

if(!function_exists('load_lib')) {
	
	function load_lib($lib_name) {
		static_loader()->load_lib($lib_name);
	}
	
}

if(!function_exists('static_image_url')) {
	
	function static_image_url($name) {
		return	static_loader()->make_static_url($name);
	}
	
}


/**
 * 后台iframe容器的js脚本，
 * 用于iframe尺寸高度的随时变化
 */
if(!function_exists('back_container_js')) {

	function back_container_js($iframeid = "frame_content", $iframe_container = "iframe_container",$side_menu = "side"){
echo <<<JS
<script type="text/javascript">
function resizeIframe(){
	var iframe = document.getElementById("$iframeid");
	try{
		var bHeight = iframe.contentWindow.document.body.scrollHeight;
		var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
		var height = Math.max(bHeight, dHeight);
		iframe.height =  height;
		$(iframe).height(height);
		$("#$iframe_container").height(height);
   	}catch (ex){}
}

window.setInterval(resizeIframe,200);

$("#$side_menu a").each(function(i){
	$(this).click(function(){
		$("#$side_menu li").removeClass("on");
		loadContent($(this).attr('href'), $(this).attr('target'));
		$(this).parent().addClass("on");
		resizeIframe();
		return false;
	});
});

function loadContent(src,t) {
	if(t && t == '_top'){
		window.top.location.href = src;
	}else{
		$("#$iframeid").attr('src', src);
	}
}
</script>
JS
;
	}
	
}

