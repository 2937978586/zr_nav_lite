<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : search.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	ini_set("display_errors", 0);
	require ('./inc/lang.php');
	require ('./module.php');
    $keyword = $_GET['keyword'];
    if(empty($keyword)){echo "<script language='javascript'>window.location.href='../';</script>";};
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <title>站内搜索_<?php if($tid==1){echo "{$row_sort['sortname']} - {$conf['name']}";}elseif($tid==2){echo "{$row_list['name']} - {$row_list['sortname']} - {$conf['name']}";}elseif($tid==3){echo "{$lang->index->about} - {$conf['name']}";}elseif($tid==4){echo "{$lang->index->nofound} - {$conf['name']}";}elseif($tid==5){echo "{$lang->index->search} - {$conf['name']}";}elseif($tid==6){echo "{$lang->index->apply} - {$conf['name']}";}else{echo "{$conf['title']}";};?></title>
        <meta name="keywords" content="<?php echo $conf['keywords'];?>">
        <meta name="description" content="<?php echo $conf['description'];?>">
	    <link rel="shortcut icon" type="images/x-icon" href="./favicon.ico"/>
	    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome-4.7.0/css/font-awesome.css"/>
	    <link rel="stylesheet" type="text/css" href="./assets/css/ozui.min.css"/>
	    <link rel="stylesheet" type="text/css" href="./templates/antidote/css/style.css"/>
    </head>
    <body>
<header class="header fixed">
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
</header><div class="banner" data-src='./assets/images/banner.jpg'>
    <ul class="search-type">
        <span class="title">搜索</span>
        <li data-type="this" class="active">本站</li>
        <li data-type="baidu">百度</li>
        <li data-type="sogou">搜狗</li>
        <li data-type="360">360</li>
        <li data-type="bing">必应</li>
    </ul>
    <form class="search-main" action="./search.html" method="get">
        <input class="search-input" placeholder="请输入关键词..." name="keyword" required="required">
        <button type="submit" class="search-btn">本站搜索</button>
    </form>
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
    <div class="main">
        <div class="card board">
            <span class="icon"><i class="fa fa-map-signs fa-fw"></i></span>
            <a href="./">导航首页</a>&nbsp;»&nbsp;<span>搜索 <?php echo $keyword;?> 的结果</span>        </div>
        <div id="<?php echo $keyword;?>" class="card">
            <div class="card-head">
                <i class="fa fa-search fa-fw"></i>搜索 <?php echo $keyword;?> 的结果    </div>
            <div class="card-body">
            <?php
                mysql_query("set names utf8");
                $results = mysql_query("SELECT * FROM zzdh_list WHERE name like '%$keyword%' or url like '%$keyword%' or introduce like '%$keyword%' order by lid asc"); //支持名称、链接、简介模糊搜索
				$count = mysql_num_rows($results); 
          		if($count == 0) {
                	echo "<div class=\"content\"><h3>暂无搜索结果，请尝试更换关键词重新搜索！</h3></div>";
                }else{
                	while($row = mysql_fetch_array($results))
                	{
            ?>
                                        <a title="<?php echo $row['url'];?>" href="<?php echo "../site_{$row['id']}.html";?>" target="_blank" class="item" data-id="<?php echo $row['id'];?>">
                            <span class="icon"><img class="lazy-load" src="../assets/images/loading.gif" data-src="<?php echo $row['img'];?>"></span>
                            <span class="name"><?php echo $row['name'];?></span>
                        </a><?php }?>
                                </div>
        </div>
            </div>
    <div class="side">
                    <div class="card">
                <div class="card-head"><i class="fa fa-bar-chart fa-fw"></i>分类总TOP10</div>
                <div class="card-body">
                    <div class="view-list">
           <?php $result=mysql_query("select * from zzdh_list order by view desc limit 10");
$pai=0;
while($rs=mysql_fetch_array($result)) {
$pai=$pai+1;
?>
                <a href="<?php if(empty($rs['alias'])){echo "/site_{$rs['id']}.html";}else{echo "/{$rs['alias']}.html";};?>" data-id="<?php echo $rs['id'];?>">
                <span class="rank"><?php echo $pai;?></span>
                <span class="icon"><img class="lazy-load" src="assets/images/loading.gif" data-src="<?php echo $rs['img'];?>"></span>
                <span class="name"><?php echo $rs['name'];?></span>
                <span class="view"><?php echo $rs['view'];?></span>
            </a><?php }?>
                                </div>
                </div>
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


</footer>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/layer/layer.js"></script>
<script src="assets/js/zzdh.js"></script>
<script src="templates/antidote/js/main.js"></script>
<?php }?>
</body>
</html>