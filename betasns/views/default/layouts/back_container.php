<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<?php load_css('admin/cui,admin/style');load_lib('jquery');?>
</head>
<body>
<div id="wp">
	<div id="hd">
       <div class="logo l">
            <a href="<?php echo site_url("main")?>"><img src="<?php echo static_image_url('admin/alogo.jpg');?>" alt="" /></a>
       </div>
       	<div id="main_menu" class="nv l">
		      <ul>
		      	<li><a href="<?php echo site_url("main")?>"><span>首页</span></a></li>
		      	<li><a href="<?php echo site_url('portal')?>"><span>门户</span></a></li>
		      	<li><a href="<?php echo site_url('member')?>"><span>用户</span></a></li>
		      	<li><a href="<?php echo site_url('content')?>"><span>内容</span></a></li>
		      	<li><a href="<?php echo site_url('resource')?>"><span>资源</span></a></li>
		      	<li><a href="<?php echo site_url('operator')?>"><span>运营</span></a></li>
		      	<li><a href="<?php echo site_url('admin')?>"><span>管理员</span></a></li>
		      	<li><a href="<?php echo site_url('account')?>"><span>帐号</span></a></li>
		      	<?php if(admin_is_root()):?>
		      		<li><a href="<?php echo site_url('root')?>"><span>ROOT</span></a></li>
		      	<?php endif;?>
		      </ul>
      	</div>
      	<script type="text/javascript">
      	$("#main_menu li").eq("<?php echo $selected_menu_index?>").addClass("on");
      	</script>
       <div class="hdr r">
            您好，<?php echo current_admin_user_name()?> | <a href="<?php echo base_url()?>">返回前台</a> | <a href="<?php echo site_url('main/logout');?>">退出</a>
       </div>
	</div>
	<?php echo $content;?>
	<div id="fd">
         <p><span>贝塔社交</span> <span>文网文[323]157号（甲）</span><span>贝塔社交</span> <span>文网文[323]157号（甲）</span></p>
	</div>
</div>
</body>
</html>