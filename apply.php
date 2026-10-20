<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : apply.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	ini_set("display_errors", 0);
	require ('./inc/lang.php');
	require ('./module.php');
?>

<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <title>申请收录_<?php if($tid==1){echo "{$row_sort['sortname']} - {$conf['name']}";}elseif($tid==2){echo "{$row_list['name']} - {$row_list['sortname']} - {$conf['name']}";}elseif($tid==3){echo "{$lang->index->about} - {$conf['name']}";}elseif($tid==4){echo "{$lang->index->nofound} - {$conf['name']}";}elseif($tid==5){echo "{$lang->index->search} - {$conf['name']}";}elseif($tid==6){echo "{$lang->index->apply} - {$conf['name']}";}else{echo "{$conf['title']}";};?></title>
        <meta name="keywords" content="<?php echo $conf['keywords'];?>">
        <meta name="description" content="<?php echo $conf['description'];?>">
	    <link rel="shortcut icon" type="images/x-icon" href="./favicon.ico"/>
	    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome-4.7.0/css/font-awesome.css"/>
	    <link rel="stylesheet" type="text/css" href="./assets/css/ozui.min.css"/>
	    <link rel="stylesheet" type="text/css" href="./templates/antidote/css/style.css"/>
	<div class="container">
		<div class="nav-bar">
			<span></span>
		</div>
		<a class="logo" href="./">
			<img src="./assets/images/logo.png" alt="<?php echo $conf['name'];?>">
		</a>
		<ul class="nav">
			<?php echo nav();?></ul>
	</div>
<div class="container">
    <ul class="sort">
        <li><a href="./"><span>返回首页</span> <i class="fa fa-reply fa-fw"></i></a></li>
<?php
	mysql_query("set names utf8");
	$result = mysql_query("SELECT * FROM zzdh_sort order by sid asc");
	while($row = mysql_fetch_array($result))
    {
?>
<li><a href="sort<?php echo $row['id'];?>.html" class="<?php if($row_list['sortname']==$row['sortname']){echo "active";}else{echo "";};?>"><span><?php echo $row['sortname'];?></span> <i class="fa <?php echo $row['icon'];?> fa-fw"></i></a></li>
<?php  }?>
                </ul>
	<div class="card board">
		<span class="icon"><i class="fa fa-map-signs fa-fw"></i></span>
		<a href="./">导航首页</a>&nbsp;»&nbsp;<span>申请收录</span>	</div>
<div class="card">
<div class="card-head">

<a ><i class="fa fa-bookmark" aria-hidden="true"></i>共计收录：<font color="red"><?php echo $cntlist?></font> - 待审网站：<font color="red"><?php echo $cntapply?></font></a>	  
	  
	  
	  
	  
	  
	  
	  
	  

      </div>
        </div>
	<div class="card">
		<div class="card-head"><i class="fa fa-plus-square fa-fw"></i>申请收录</div>
		<div class="card-body">
			<div class="content">
        <h2 style="text-align: center;"><span style="color: #e03e2d;"><strong>收录规则</strong></span></h2>
<p><span style="color: #e03e2d;"><strong>1.</strong><strong>不收录：岱唰网、岱挂网、秒攒网、黄色站等违规站</strong></span></p>
<p><strong><span style="color: #e03e2d;">2.必须上本站的友情链接，否则不过审（可任意位置）</span></strong></p>
<p><strong><span style="color: #e03e2d;">3.置顶站点只能是正规网站；月租广告支持任何网站</span></strong></p>
<p><strong><span style="color: #e03e2d;">4.站长QQ2937978586</span></strong></p>
<p><strong>本站名称：孜然导航网</strong></p>
<p><strong>本站域名：http://zrv7.com</strong></p>
<p><strong>本站logo：http://www.zrv7.com/favicon.ico</strong></p>
<p><strong>本站ico：http://www.zrv7.com/favicon.ico</strong></p>
<p><strong>或者将以下代码添加到您的网站底部即可:&lt;a href="http://www.zrv7.com" target="_blank"&gt;孜然导航网&lt;/a&gt;</strong></p>
			<form action="./inc/submit.php" method="post">
				<div class="oz-xs-12 oz-sm-6 oz-form-group">
					<label class="oz-form-label">网站名称</label>
					<label class="oz-form-field">
						<input type="text" name="name" id="name" placeholder="请输入站点名称[必填]" required>
					</label>
				</div>
				<div class="oz-xs-12 oz-sm-6 oz-form-group">
					<label class="oz-form-label">网站分类</label>
					<label class="oz-form-field">
						<select name="sortid" id="sortid" required>
							<option value="">请选择站点分类[必选]</option>
							<?php
								mysql_query("set names utf8");
								$result = mysql_query("SELECT * FROM zzdh_sort order by sid asc");
								while($row = mysql_fetch_array($result))
								{
							?>
							<option value="<?php echo $row['sortname'];?>"><?php echo $row['sortname'];?></option>
							<?php }?> 
						</select>
					</label>
				</div>
				<div class="oz-xs-12 oz-sm-6 oz-form-group">
					<label class="oz-form-label">网站网址</label>
					<label class="oz-form-field">
						<input type="url" name="domain" id="domain" placeholder="请输入站点域名,包含http或者https[必填]" required>
					</label>
				</div>
				<div class="oz-xs-12 oz-sm-6 oz-form-group">
					<label class="oz-form-label">站长Q Q</label>
					<label class="oz-form-field">
						<input type="ul" name="doain" id="doain" placeholder="请输入站长QQ[选填]" >
					</label>
				</div>
				<div class="oz-xs-12 oz-sm-6 oz-form-group">
					<label class="oz-form-label">网站简介</label>
				<textarea rows="3" class="oz-form-textarea" placeholder="请输入网站简介[必填]" aria-describedby="basic-addon1" name="introduce" required></textarea>


				</div>
				<div class="oz-center" style="margin-bottom: 8px">
					<button class="oz-btn oz-bg-blue" type="submit" name="submit" style="margin-right: 10px">
						<i class="fa fa-telegram fa-fw" aria-hidden="true"></i> 手动提交
				<div class="oz-center" style="margin-bottom: 8px">
					<button class="oz-btn oz-bg-blue" type="submit" name="submit" style="margin-right: 10px">
						<i class="fa fa-telegram fa-fw" aria-hidden="true"></i> 自动收录
				</div>
			</form>
		</div>
	</div>
</div>

<ul class="suspend">
	<li class="back-top" onclick="backTop()">
		<i class="fa fa-chevron-up"></i>
		<span class="more">返回顶部</span>
	</li>
	<li>
		<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['qq'];?>&site=qq&menu=yes">
			<i class="fa fa-qq"></i>
			<span class="more"><?php echo $conf['qq'];?></span>
		</a>
	</li>
	<li>
		<a href="mailto:<?php echo $conf['qq'];?>@qq.com">
			<i class="fa fa-envelope"></i>
			<span class="more"><?php echo $conf['qq'];?>@qq.com</span>
		</a>
	</li>
	<li>
		<i class="fa fa-weixin"></i>
		<span class="more weixin"><img src="assets/images/weixin.png" alt="微信二维码"></span>
	</li>
</ul>

<?php	require ('./footer.php');?>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/layer/layer.js"></script>
<script src="templates/antidote/js/main.js"></script>
<script>
(function(){
var src = "https://jspassport.ssl.qhimg.com/11.0.1.js?d182b3f28525f2db83acfaaf6e696dba";
document.write('<script src="' + src + '" id="sozz"><\/script>');
})();
</script>
</body>
</html>