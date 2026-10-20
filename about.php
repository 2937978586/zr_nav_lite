<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : about.php
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
        <title>关于我们_<?php if($tid==1){echo "{$row_sort['sortname']} - {$conf['name']}";}elseif($tid==2){echo "{$row_list['name']} - {$row_list['sortname']} - {$conf['name']}";}elseif($tid==3){echo "{$lang->index->about} - {$conf['name']}";}elseif($tid==4){echo "{$lang->index->nofound} - {$conf['name']}";}elseif($tid==5){echo "{$lang->index->search} - {$conf['name']}";}elseif($tid==6){echo "{$lang->index->apply} - {$conf['name']}";}else{echo "{$conf['title']}";};?></title>
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
		<a href="./">导航首页</a>&nbsp;»&nbsp;<span>关于本站</span>	</div>
	<div class="card">
		<div class="card-head"><i class="fa fa-info-circle fa-fw"></i>本站简介</div>
		<div class="card-body">
			<div class="content">
				<p>本站名称：<?php echo $conf['name'];?></p>
				<p>本站标题：<?php echo $conf['title'];?></p>
				<p>本站关键词：<?php echo $conf['keywords'];?></p>
				<p>本站描述：<?php echo $conf['description']?></p>
				<p>本站域名：<?php echo $_SERVER['HTTP_HOST'];?></p>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-head"><i class="fa fa-pie-chart fa-fw"></i>网站统计</div>
		<div class="card-body">
			<div class="content">
				<p>开设分类：<b><?php echo $cntsort?></b> 个</p>
				<p>收录站点：<b><?php echo $cntlist?></b> 个</p>
	            <p>正申请站点：<b><?php echo $cntapply?></b> 个</p>
				<p>已发布公告：<b><?php echo $cntnotice;?></b> 条</p>
				<p>本站已稳定运行了 <b><script language="JavaScript" type="text/javascript">var urodz = new Date("<?php echo $conf['time'];?>");var now = new Date();var ile = now.getTime() - urodz.getTime();var dni = Math.floor(ile / (1000 * 60 * 60 * 24));document.write( + dni)</script></b> 天。</p>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-head"><i class="fa fa-telegram fa-fw"></i>联系方式</div>
		<div class="card-body">
			<div class="content">
				<p>ＱＱ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['qq'];?>&site=qq&menu=yes" target="_blank"><?php echo $conf['qq'];?></a><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2937978586&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:2937978586:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
				<p>邮箱：<a href="mailto:<?php echo $conf['email'];?>"><?php echo $conf['email']?></a><a target="_blank" href="https://qm.qq.com/cgi-bin/qm/qr?k=W6YMrkufFrykW0X727YQh3aChH0BZ5fE&jump_from=webapi"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="沙雕网友斗图群" title="沙雕网友斗图群"></a></p>
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

<footer class="footer">
</div> <span>此内容系本站根据来路自动抓取的结果，不代表本站赞成被显示网站的内容或立场。</span></div></div>
<script src="https://www.xiongzhuahao.com/templets/default/css/jquery.min.js"></script>
<script src="https://www.xiongzhuahao.com/templets/default/css/popper.min.js"></script>
<script src="https://www.xiongzhuahao.com/templets/default/css/bootstrap.min.js"></script>
<script src="https://www.xiongzhuahao.com/templets/default/css/custom.js"></script>
<script src="https://www.xiongzhuahao.com/templets/default/css/jq-public.js"></script>
<script src="https://www.xiongzhuahao.com/templets/default/css/busuanzi.pure.mini.js"></script>
<div align="center">本页阅读量<span id="busuanzi_value_page_pv"></span>次 | 本站总访问量<span id="busuanzi_value_site_pv"></span>次</span> | 本站总访客数<span id="busuanzi_value_site_uv"></span>人<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?c343e5991e72e10d51fba15a3c894fa2";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</div>



	<center>今天:<span><script language=Javascript type=text/Javascript> 
var day=""; 
var month=""; 
var ampm=""; 
var ampmhour=""; 
var myweekday=""; 
var year=""; 
mydate=new Date(); 
myweekday=mydate.getDay(); 
mymonth=mydate.getMonth()+1; 
myday= mydate.getDate(); 
myyear= mydate.getYear(); 
year=(myyear > 200) ? myyear : 1900 + myyear; 
if(myweekday == 0) 
weekday=" 星期日 "; 
else if(myweekday == 1) 
weekday=" 星期一 "; 
else if(myweekday == 2) 
weekday=" 星期二 "; 
else if(myweekday == 3) 
weekday=" 星期三 "; 
else if(myweekday == 4) 
weekday=" 星期四 "; 
else if(myweekday == 5) 
weekday=" 星期五 "; 
else if(myweekday == 6) 
weekday=" 星期六 "; 
document.write(year+"年"+mymonth+"月"+myday+"日 "+weekday); 
</script><br>
<span id="showsectime" style="color:#FF0000;">
<script type="text/javascript">
function NewDate(str) { 
str = str.split('-'); 
var date = new Date(); 
date.setUTCFullYear(str[0], str[1] - 1, str[2]); 
date.setUTCHours(0, 0, 0, 0, 0); 
return date; 
} 
function showsectime() {
var birthDay =NewDate("<?php echo $conf['time'];?>");//这里是建站时间
var today=new Date();
var timeold=today.getTime()-birthDay.getTime();
var sectimeold=timeold/1000
var secondsold=Math.floor(sectimeold);
var msPerDay=24*60*60*1000; var e_daysold=timeold/msPerDay;
var daysold=Math.floor(e_daysold);
var e_hrsold=(daysold-e_daysold)*-24;
var hrsold=Math.floor(e_hrsold);
var e_minsold=(hrsold-e_hrsold)*-60;
var minsold=Math.floor((hrsold-e_hrsold)*-60); var seconds=Math.floor((minsold-e_minsold)*-60).toString();
document.getElementById("showsectime").innerHTML = "本站已安全运行"+daysold+"天"+hrsold+"小时"+minsold+"分"+seconds+"秒";
setTimeout(showsectime, 1000);
}showsectime();
</script>

</footer>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/layer/layer.js"></script>
<script src="assets/js/zzdh.js"></script>
<script src="templates/antidote/js/main.js"></script>
</body>
</html>