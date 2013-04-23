function do_post_refresh(url,message){
	if(window.confirm(message)){
		$.post(url,{'submitlink':true},function(message){
			window.location.href = window.location.href; 
		});
	}
}

function _n(name){
	return $("*[name="+name+"]");
}