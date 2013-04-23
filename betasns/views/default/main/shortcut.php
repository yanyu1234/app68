<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="http://192.168.1.104/zgz/static/admin/css/cui.css" />
	<link rel="stylesheet" href="http://192.168.1.104/zgz/static/admin/css/frame.css" />
	<link rel="stylesheet" href="http://192.168.1.104/zgz/static/admin/css/mind.css" />
</head>

<body>
	<div class="currentloca">
<p id="admincpnav">首页&nbsp;»&nbsp;快捷菜单管理&nbsp;&nbsp;
</p>
<div class="sitemapbtn">
<div style="float: left; margin:-7px 10px 0 0">
<form name="search" method="post" autocomplete="off" action="admin.php?action=search" target="main">
<input type="text" name="keywords" value="" class="txt" x-webkit-speech="" speech="">
<input type="hidden" name="searchsubmit" value="yes" class="btn">
<input type="submit" name="searchsubmit" value="搜索" class="btn" ></form></div>
<span id="add2custom" style="display: none"></span>
<a href="###" id="cpmap" onclick="showMap();return false;"><img src="images/btn_map.gif" title="管理中心导航(ESC键)" width="46" height="18"></a>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".add_by_id").click(function(){
			url = $(this).attr('href');
			$.post(url,
				function(data){
					alert(data);
				},
				"text"
			);
			return false;
		})
	})
</script>	<div class="main">
		<div class="itemtitle">
	<h2 class="left color09c">菜单管理</h2>
	<ul class="left nav-tab">
	    <li class="current"><a href="http://192.168.1.104/zgz/admin.php/login/menu/read.html"><span>菜单列表</span></a></li>
	    <li ><a href="http://192.168.1.104/zgz/admin.php/login/menu/add.html"><span>添加菜单</span></a></li>
	</ul>
</div>
				
		<!-- 列表start -->
		<div class="btn-box">
			<a href="http://192.168.1.104/zgz/admin.php/login/menu/read.html">菜单列表</a>
						共8条记录
		</div>
		<div class="table">
			<table>
				<tr>
					<th width="3%">编号</th>
					<th>名称</th>
					<th width="20%" style="display: none">链接</th>
					<th width="10%">显示</th>
											<th width="10%">权限</th>
											<th width="5%">排序值</th>
					<th width="10%">操作</th>
				</tr>
									<tr>
					<td num="1" class="num">1</td>
											<td><a href="http://192.168.1.104/zgz/admin.php/login/menu/read/1.html">首页</a></td>
												
					<td style="display: none"></td>
					<td>
						<select url="http://192.168.1.104/zgz/admin.php/login/menu/show/1.html" class="show">
							<option value='0' >否</option>
							<option value='1' selected='selected'>是</option>
						</select>
					</td>
					
											
					<td>1</td>
					<td>
						<a href="http://192.168.1.104/zgz/admin.php/login/menu/edit/1.html">编辑</a>
												<a href='' onclick="alert('有子菜单,不允许删除')">删除</a>
											</td>
				</tr>
									<tr>
					<td num="2" class="num">2</td>
											<td><a href="http://192.168.1.104/zgz/admin.php/login/menu/read/2.html">门户</a></td>
												
					<td style="display: none"></td>
					<td>
						<select url="http://192.168.1.104/zgz/admin.php/login/menu/show/2.html" class="show">
							<option value='0' >否</option>
							<option value='1' selected='selected'>是</option>
						</select>
					</td>
					
											
					<td>2</td>
					<td>
						<a href="http://192.168.1.104/zgz/admin.php/login/menu/edit/2.html">编辑</a>
												<a href='' onclick="alert('有子菜单,不允许删除')">删除</a>
											</td>
				</tr>
									<tr>
					<td num="3" class="num">3</td>
											<td><a href="http://192.168.1.104/zgz/admin.php/login/menu/read/3.html">用户</a></td>
												
					<td style="display: none"></td>
					<td>
						<select url="http://192.168.1.104/zgz/admin.php/login/menu/show/3.html" class="show">
							<option value='0' >否</option>
							<option value='1' selected='selected'>是</option>
						</select>
					</td>
					
											
					<td>3</td>
					<td>
						<a href="http://192.168.1.104/zgz/admin.php/login/menu/edit/3.html">编辑</a>
												<a href='' onclick="alert('有子菜单,不允许删除')">删除</a>
											</td>
				</tr>
									<tr>
					<td num="4" class="num">4</td>
											<td><a href="http://192.168.1.104/zgz/admin.php/login/menu/read/4.html">内容</a></td>
												
					<td style="display: none"></td>
					<td>
						<select url="http://192.168.1.104/zgz/admin.php/login/menu/show/4.html" class="show">
							<option value='0' >否</option>
							<option value='1' selected='selected'>是</option>
						</select>
					</td>
					
											
					<td>4</td>
					<td>
						<a href="http://192.168.1.104/zgz/admin.php/login/menu/edit/4.html">编辑</a>
												<a href='' onclick="alert('有子菜单,不允许删除')">删除</a>
											</td>
				</tr>
									<tr>
					<td num="5" class="num">5</td>
											<td><a href="http://192.168.1.104/zgz/admin.php/login/menu/read/5.html">资源</a></td>
												
					<td style="display: none"></td>
					<td>
						<select url="http://192.168.1.104/zgz/admin.php/login/menu/show/5.html" class="show">
							<option value='0' >否</option>
							<option value='1' selected='selected'>是</option>
						</select>
					</td>
					
											
					<td>5</td>
					<td>
						<a href="http://192.168.1.104/zgz/admin.php/login/menu/edit/5.html">编辑</a>
												<a href='' onclick="alert('有子菜单,不允许删除')">删除</a>
											</td>
				</tr>
									<tr>
					<td num="6" class="num">6</td>
											<td><a href="http://192.168.1.104/zgz/admin.php/login/menu/read/6.html">运营</a></td>
												
					<td style="display: none"></td>
					<td>
						<select url="http://192.168.1.104/zgz/admin.php/login/menu/show/6.html" class="show">
							<option value='0' >否</option>
							<option value='1' selected='selected'>是</option>
						</select>
					</td>
					
											
					<td>6</td>
					<td>
						<a href="http://192.168.1.104/zgz/admin.php/login/menu/edit/6.html">编辑</a>
												<a href='' onclick="alert('有子菜单,不允许删除')">删除</a>
											</td>
				</tr>
									<tr>
					<td num="7" class="num">7</td>
											<td><a href="http://192.168.1.104/zgz/admin.php/login/menu/read/7.html">管理员</a></td>
												
					<td style="display: none"></td>
					<td>
						<select url="http://192.168.1.104/zgz/admin.php/login/menu/show/7.html" class="show">
							<option value='0' >否</option>
							<option value='1' selected='selected'>是</option>
						</select>
					</td>
					
											
					<td>7</td>
					<td>
						<a href="http://192.168.1.104/zgz/admin.php/login/menu/edit/7.html">编辑</a>
												<a href='' onclick="alert('有子菜单,不允许删除')">删除</a>
											</td>
				</tr>
									<tr>
					<td num="8" class="num">8</td>
											<td><a href="http://192.168.1.104/zgz/admin.php/login/menu/read/8.html">账户</a></td>
												
					<td style="display: none"></td>
					<td>
						<select url="http://192.168.1.104/zgz/admin.php/login/menu/show/8.html" class="show">
							<option value='0' >否</option>
							<option value='1' selected='selected'>是</option>
						</select>
					</td>
					
											
					<td>8</td>
					<td>
						<a href="http://192.168.1.104/zgz/admin.php/login/menu/edit/8.html">编辑</a>
												<a href='' onclick="alert('有子菜单,不允许删除')">删除</a>
											</td>
				</tr>
								</table>
					</div>
		<!-- 列表end -->
		
	</div>
</body>
</html>