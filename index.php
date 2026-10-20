<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : index.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

$index = 'active';
require ('./header.php');
?>
<div id="置顶站点" class="card">
    <div class="card-head"><i class="fa fa-diamond" aria-hidden="true"></i><font style="color:red">置顶站点：20永久</font></font></a>                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['qq'];?>&site=qq&menu=yes" class="more"><i class="fa fa-heart" aria-hidden="true"></i>点击购买</a></div>
    <div class="top-grid">

        <?php
        mysql_query("set names utf8");
        $results = mysql_query("SELECT * FROM zzdh_list where tui = '1' order by lid asc limit 15");
        while($rows = mysql_fetch_array($results))
        {
            ?>
        <a href="<?php echo "../site_{$rows['id']}.html";?>" class="item" title="<?php echo $rows['name'];?>" data-id="<?php echo $rows['id'];?>">
            <span class="icon"><img class="lazy-load" src="assets/images/loading.gif" data-src="<?php echo $rows['img'];?>"></span>
            <span class="name"><?php echo $rows['name'];?></span>
            </a><?php }?>
    </div>
</div>
<div class="card">
    <?php echo notice('2');?>
</div>
<div class="card">
    <div class="card-head">
        <i class="fa fa-link fa-fw"></i>最新点入：做上本站友链,在您站上点击一次,即可自动排在本站第一位!<a href="apply.html" class="more"><i class="fa fa-plus-square" aria-hidden="true"></i>申请收录</a>
    </div>
    <div class="card-body">
        <?php
        mysql_query("set names utf8");
        $results = mysql_query("SELECT * FROM zzdh_list order by addtime desc limit 36");
        while($rows = mysql_fetch_array($results))
        { ?><a href="<?php echo "../site_{$rows['id']}.html";?>" target="_blank" class="item" title="<?php echo $rows['name'];?>" data-id="<?php echo $rrows['id'];?>">
            <span class="icon"><img class="lazy-load" src="assets/images/loading.gif" data-src="<?php echo $rows['img'];?>"></span>
            <span class="name"><?php echo $rows['name'];?></span>
            </a><?php }?>
    </div>
</div>
<?php
mysql_query("set names utf8");
$result = mysql_query("SELECT * FROM zzdh_sort order by sid asc");
while($row = mysql_fetch_array($result))
{ ?>
    <a id="<?php echo $row['sortname'];?>"></a>
<div id="<?php echo $row['sortname'];?>" class="card">
    <div class="card-head">
        <i class="fa <?php echo $row['icon'];?> fa-fw"></i><?php echo $row['sortname'];?><a href="<?php echo "../sort{$row['id']}.html";?>" class="more"><i class="fa fa-ellipsis-h fa-fw"></i></a>
    </div>
    <div class="card-body">
        <?php
        mysql_query("set names utf8");
        $results = mysql_query("SELECT * FROM zzdh_list where sortname = '".$row['sortname']."' order by view_date desc limit 18");
        while($rows = mysql_fetch_array($results))
        {
            ?>
        <a href="<?php echo "../site_{$rows['id']}.html";?>" target="_blank" class="item" title="<?php echo $rows['name'];?>" data-id="<?php echo $rrows['id'];?>">
            <span class="icon"><img class="lazy-load" src="assets/images/loading.gif" data-src="<?php echo $rows['img'];?>"></span>
            <span class="name"><?php echo $rows['name'];?></span>
            </a><?php }?>
    </div>
    </div><?php }?>
</div>


<div class="side">


    <div class="card">
        <div class="card-head">

            <a ><i class="fa fa-bookmark" aria-hidden="true"></i>共计收录：<font color="red"><?php echo $cntlist?></font> - 待审网站：<font color="red"><?php echo $cntapply?></font></a>









        </div>
    </div>



    <div class="card">
        <div class="card-head"><i class="fa fa-line-chart fa-fw"></i>本周TOP10</div>
        <div class="card-body">
            <div class="view-list">
                <?php $result=mysql_query("select * from zzdh_list order by view_week desc limit 10");
                $pai=0;
                while($rs=mysql_fetch_array($result)) {
                    $pai=$pai+1;
                    ?>
                <a href="<?php echo "../site_{$rs['id']}.html";?>" data-id="<?php echo $rs['id'];?>">
                    <span class="rank"><?php echo $pai;?></span>
                    <span class="icon"><img class="lazy-load" src="assets/images/loading.gif" data-src="<?php echo $rs['img'];?>"></span>
                    <span class="name"><?php echo $rs['name'];?></span>
                    <span class="view"><?php echo $rs['view_week'];?></span>
                    </a><?php }?>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-head"><i class="fa fa-coffee fa-fw"></i>最新收录</div>
        <div class="card-body">
            <div class="side-latest oz-timeline">
                <?php $result=mysql_query("select * from zzdh_list order by time desc limit 5");
                while($rs=mysql_fetch_array($result)) {
                    ?>
                <a href="<?php echo "../site_{$rs['id']}.html";?>" data-id="<?php echo $rs['id'];?>" data-id="<?php echo $rs['id'];?>" class="oz-timeline-item">
                    <div class="oz-timeline-time"><?php echo date("Y-m-d h:i:s", $rs['time']);?></div>
                    <div class="oz-timeline-main">
                        <span class="icon"><img class="lazy-load" src="assets/images/loading.gif" data-src="<?php echo $rs['img'];?>"></span>
                        <span class="name"><?php echo $rs['name'];?></span>
                    </div>
                    </a><?php }?>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-head"><i class="fa fa-pie-chart fa-fw"></i>热度统计</div>
        <div class="card-body">
            <div class="side-common">
                <p>今日有<?php top('view_day','1');?></p>
                <p>今日最受欢迎的站点是：<?php top('view_day');?></p>
                <p>周月有<?php top('view_week','1');?></p>
                <p>周月最受欢迎的站点是：<?php top('view_week');?></p>
                <p>本月有<?php top('view_month','1');?></p>
                <p>本月最受欢迎的站点是：<?php echo top('view_month');?></p>
                <p>累计有<?php top('view','1');?></p>
                <p>总共最受欢迎的站点是：<?php top('view');?></p>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-head"><i class="fa fa-folder-open fa-fw"></i>导航分类</div>
        <div class="card-body">
            <div class="side-sort">
                <?php
                mysql_query("set names utf8");
                $result = mysql_query("SELECT * FROM zzdh_sort order by sid asc");
                while($row = mysql_fetch_array($result))
                { ?><a href="<?php echo "../sort{$row['id']}.html";?>"><i class="fa <?php echo $row['icon'];?> fa-fw"></i><?php echo $row['sortname'];?></a>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-head"><i class="fa fa-leaf fa-fw"></i>最新文章</div>
        <div class="card-body">
            <div class="side-common">
                <p><a href="http://zrv7.com" target="_blank">①该功能正在开发中，请等待下个版本的更新</a>
                </p>


            </div>
        </div>
    </div>
</div>
<div class="card links">
    <div class="card-head"><i class="fa fa-link fa-fw"></i>友情链接</div>
    <div class="card-body">
        <a href="http://www.zrv7.com" target="_blank">孜然导航网</a>
        <?php echo notice('2');?>
        <?php echo notice('3');?>
        <?php echo notice('4');?>
        <?php echo notice('5');?>
        <?php echo notice('6');?>
        <?php echo notice('7');?>
        <?php echo notice('8');?>
        <?php echo notice('9');?>
        <?php echo notice('10');?>
        <?php echo notice('11');?>
        <?php echo notice('12');?>
        <?php echo notice('13');?>
        <?php echo notice('14');?>
        <?php echo notice('15');?>
        <?php echo notice('16');?>
        <?php echo notice('17');?>
        <?php echo notice('18');?>
        <?php echo notice('19');?>
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

