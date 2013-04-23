<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录到betasns</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<?php load_css('admin/cui,admin/style');load_lib('jquery')?>
<script type="text/javascript">
$(function(){
	$('.inp').focus(function(){ $(this).addClass('bor');}); 
	$('.inp').blur(function(){ $(this).removeClass('bor');});
});
</script>
</head>
<body>
<div id="wp-login">
	<div id="bd">
        <div class="col-l">
            <img src="<?php echo static_image_url('admin/logo.jpg')?>" alt="betasns" />
            <p>betasns!是<a href="http://itianmen.com">天门</a>公司推出的已社区伟基础的专业建站平台，帮助网站实现一站式服务。</p>
        </div>
        <div class="col-r">
            <form action="" method="post">
            账　号：<input type="text" class="inp" name="adminusername" />
            <div class="h"></div> 
            密　码：<input type="password" class="inp" name="adminpassword" />
            <div class="h"></div>
            验证码：<input type="text" name="admincode" class="inp" style="width:80px" /> <img src="<?php echo site_url('main/code');?>" alt="" class="vm"/>
            <div class="h"></div>
            <div class="bnt"><input type="submit" value="登陆" /></div>
            </form>
        </div> 
	</div>
</div>
<div id="fd">
	<p><span>贝塔社交</span> <span>文网文[323]157号（甲）</span></p>
</div>
</body>
</html>