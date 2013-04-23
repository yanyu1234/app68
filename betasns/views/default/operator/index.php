<div id="bd" class="fix">
<div class="col-l pr">
<ul class="pa snv" id="side">
	<li class="on"><a href="<?php echo site_url('operator/pagelist')?>">页面管理</a></li>
	<li><a href="<?php echo site_url('operator/seo')?>">SEO</a></li>
	<li><a href="<?php echo site_url('operator/ad')?>">广告管理</a></li>
	<li><a href="<?php echo site_url('operator/adarea')?>">广告位管理</a></li>
	<li><a href="<?php echo site_url('operator/common_value')?>">页面通用参数</a></li>
</ul>
</div>
<div class="col-r" id="iframe_container">
<iframe id="frame_content" name="fra" src="<?php echo site_url('operator/pagelist')?>" scrolling="no" frameborder="0" style="height:400px;"></iframe>
<?php back_container_js();?>
</div>
</div>