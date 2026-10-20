</script>

<ul class="suspend">
	<li class="back-top" onclick="backTop()">
		<i class="fa fa-chevron-up"></i>
		<span class="more">返回顶部</span>
	</li>
	<li>
		<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : footer.php
 * @Copyright (c) Cumin All Rights Reserved.
 */
 echo $conf['qq'];?>&site=qq&menu=yes">
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
<p>© 2021 <a href="http://zrv7.com"><?php echo $conf['name'];?></a>. All Rights Reserved.</p>
<p><?php echo $conf['info'];?></p>
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
<script src="templates/antidote/js/main.js"></script>
﻿
</body>
</html>