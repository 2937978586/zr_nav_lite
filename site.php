<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : site.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	ini_set("display_errors", 0);
	require ('./inc/lang.php');
	require ('./module.php');
	if(empty($row_list['id'])){echo "<script language='javascript'>window.location.href='../404.html';</script>";};
	mysql_query("set names utf8");
    $id = $_GET['id'];
	//增加浏览数
	$sql = "update zzdh_list set 
view=view+1,
view_day=IF(DATEDIFF(CURDATE(),view_date)>0,1,view_day+1),
view_week=IF(
    DATEDIFF(CURDATE(),view_date)>6,1,
    IF(WEEKDAY(CURDATE())<WEEKDAY(view_date),1,view_week+1)
        ),
view_month=IF(
    DATEDIFF(CURDATE(),view_date)>30,1,
    IF(DAY(CURDATE())<DAY(view_date),1,view_month+1)
        ),
view_date=Now() 
where id = '$id'";
	$result = mysql_query($sql);
	preg_match("/^(http:\/\/|https:\/\/)?([^\/]+)/i", $row_list['url'], $matches); //获取该网站域名
	$domain = $matches[2]; 
?>

<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <title><?php echo $row_list['name'];?>_<?php echo $conf['name'];?></title>
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
            <a href="./">导航首页</a>&nbsp;»&nbsp;<a title="<?php echo $row_list['sortname'];?>" href="<?php if(empty($rows_sort['alias'])){echo "../sort{$rows_sort['id']}.html";}else{echo "../sort{$rows_sort['alias']}.html";};?>"><?php echo $row_list['sortname'];?></a>&nbsp;»&nbsp;<span><?php echo $row_list['name'];?></span>        </div>
        <div class="card">
            <div class="card-body">
                <div class="part-main">
                    <span class="site-name"><?php echo $row_list['name'];?></span>
                    <span class="oz-xs-12 oz-sm-6 oz-lg-4">站点域名：<?php echo $domain;?></span>
                    <span class="oz-xs-12 oz-sm-6 oz-lg-4">站点星级：<img class="lazy-load" src="templates/antidote/images/star/<?php $dj=$row_list['dj'];if($dj==1){echo "1";}elseif($dj==2){echo "2";}elseif($dj==3){echo "3";}elseif($dj==4){echo "4";}else{echo "5";};?>.png"></span>
                    <span class="oz-xs-12 oz-sm-6 oz-lg-4">收录时间：<?php echo date("Y-m-d", $row_list['time']);?></span>
                    <span class="oz-xs-6 oz-sm-6 oz-lg-4">所属分类：<a title="<?php echo $row_list['sortname'];?>" href="<?php if(empty($rows_sort['alias'])){echo "../sort{$rows_sort['id']}.html";}else{echo "../sort{$rows_sort['alias']}.html";};?>"><?php echo $row_list['sortname'];?></a></span>
                    <span class="oz-xs-6 oz-sm-6 oz-lg-4">百度权重：<img class="lazy-load" src="https://baidurank.aizhan.com/api/br?domain=<?php echo $domain;?>&style=images"></span>
                    <span class="oz-xs-6 oz-sm-6 oz-lg-4">移动权重：<img class="lazy-load" src="https://baidurank.aizhan.com/api/mbr?domain=<?php echo $domain;?>&style=images"></span>
                    <span class="oz-xs-6 oz-sm-6 oz-lg-4">月浏览数：<?php echo $row_list['view_month'];?>次</span>
                    <span class="oz-xs-6 oz-sm-6 oz-lg-4">周浏览数：<?php echo $row_list['view_week'];?>次</span>
                    <span class="oz-xs-6 oz-sm-6 oz-lg-4">日浏览数：<?php echo $row_list['view_day'];?>次</span>
                </div>
                <div class="part-side">
                    <div class="site-img">
                        <img class="lazy-load" src="assets/images/loading.gif" data-src="<?php echo $conf['api'];?><?php echo $row_list['url'];?>">
                    </div>
                    <a title="<?php echo $domain;?>" href="go.php?url=<?php echo $row_list['url'];?>" target="_blank" data-id="1" class="oz-btn oz-btn-lg oz-btn-block oz-bg-orange">
<i class="fa fa-location-arrow" aria-hidden="true"></i> 网站直达
                    </a>

				<a title="<?php echo $domain;?>" href="go.php?url=<?php echo $row_list['url'];?>" target="_blank" data-id="1" class="oz-btn oz-btn-lg oz-btn-block oz-bg-green">
<i class="fa fa-bolt" aria-hidden="true"></i> 推送本站
</a>


                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-head">
                <i class="fa fa-feed fa-fw" aria-hidden="true"></i> 站点信息
            </div>
            <div class="card-body">
                <div class="content">
<p><b>站点域名：</b><font color="#FF0000"><?php echo $domain;?></font> </p>
<p><b>站点标题：</b><font color="#FF0000"><?php echo $row_list['name'];?></font> </p>
<p><b>站点关键：</b><font color="#FF0000"><?php echo $row_list['alias'];?></font> </p>
<p><b>站点描述：</b><font color="#FF0000"><?php echo $row_list['introduce'];?></font> </p>
<p><b>相关查询：
<a title="Whois查询" href="http://whois.chinaz.com/<?php echo $domain;?>" target="_blank">Whois查询 | </a> 
<a title="综合查询" href="http://seo.chinaz.com/?host=<?php echo $domain;?>" target="_blank">综合查询 | </a> 
<a title="排名查询" href="http://alexa.chinaz.com/<?php echo $domain;?>" target="_blank">排名查询 | </a> 
<a title="PR查询" href="http://pr.chinaz.com/<?php echo $domain;?>" target="_blank">PR查询 | </a> 
<a title="网站测速" href="http://tool.chinaz.com/speedtest.aspx?host=<?php echo $domain;?>" target="_blank">网站测速 | </a> 
<a title="备案查询" href="http://icp.chinaz.com/<?php echo $domain;?>" target="_blank">备案查询 | </a>
<a title="友链检测" href="http://link.chinaz.com/?wd=<?php echo $domain;?>" target="_blank">友链检测 | </a>
<a title="百度权重" href="http://rank.chinaz.com/?host=<?php echo $domain;?>" target="_blank">百度权重 | </a>
<a title="百度收录" href="https://www.baidu.com/s?wd=site%3A<?php echo $domain;?>" target="_blank">百度收录 </a></p>






					
					<!--center><img class="lazy-load" src="assets/images/loading.gif" data-src="<?php echo $conf['api'];?><?php echo $row_list['url'];?>"></center><br>
					<?php echo $row_list['introduce'];?><br><br><br-->
                </div>
            </div>
        </div>

 <div class="card">
            <div class="card-head">
<i class="fa fa-envira" aria-hidden="true"></i> 温馨提示
            </div>
            <div class="card-body">
                    <div class="lianmeng-neiye-body">
			<div class="content">
<font color="#ff0000">提示：加上本站的友情链接，可加快百度收录</font><br>
<span style="color: #000000; font-size: 14px;"><strong>&lt;a href=&quot;http://www.zrv7.com&quot; target=&quot;_blank&quot;&gt;孜然导航网&lt;/a&gt;</strong></span>
            </div>
		</div>
    </div>
    </div>
                    <div class="card">
            <div class="card-head">
<i class="fa fa-cubes" aria-hidden="true"></i> 相关站点
            </div>
            <div class="card-body">
			<?php
				mysql_query("set names utf8");
				$results = mysql_query("SELECT * FROM zzdh_list where sortname = '".$row_list['sortname']."' order by lid asc limit 15");
				while($rows = mysql_fetch_array($results))
				{
		    ?>
                                            <a href="<?php echo "../site_{$rows['id']}.html"; ?>" class="item" title="<?php echo $rows['name'];?>" data-id="<?php echo $rrows['id'];?>">
                            <span class="icon"><img class="lazy-load" src="assets/images/loading.gif" data-src="<?php echo $rows['img'];?>"></span>
                            <span class="name"><?php echo $rows['name'];?></span>
                        </a><?php }?>
                                       
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
</body>
</html>