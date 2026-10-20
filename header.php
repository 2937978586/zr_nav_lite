<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : header.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

ini_set("display_errors", 0);
require ('./inc/lang.php');
require ('./module.php');
preg_match("/^(http:\/\/|https:\/\/)?([^\/]+)/i", $_SERVER['HTTP_REFERER'], $laiyuan); //获取该网站域名
$zhandian = $laiyuan[2];
if($zhandian!='' && $zhandian!=$_SERVER['HTTP_HOST']){
    mysql_query("set names utf8");
    $sql = "update zzdh_list set addtime = '".time()."' where url LIKE '%//".$zhandian."%'";
    $result = mysql_query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title><?php if($tid==1){echo "{$row_sort['sortname']} - {$conf['name']}";}elseif($tid==2){echo "{$row_list['name']} - {$row_list['sortname']} - {$conf['name']}";}elseif($tid==3){echo "{$lang->index->about} - {$conf['name']}";}elseif($tid==4){echo "{$lang->index->nofound} - {$conf['name']}";}elseif($tid==5){echo "{$lang->index->search} - {$conf['name']}";}elseif($tid==6){echo "{$lang->index->apply} - {$conf['name']}";}else{echo "{$conf['title']}";};?></title>
    <meta name="keywords" content="<?php echo $conf['keywords'];?>">
    <meta name="description" content="<?php echo $conf['description'];?>">
    <link rel="shortcut icon" type="images/x-icon" href="./favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome-4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/ozui.min.css"/>
    <link rel="stylesheet" type="text/css" href="./templates/antidote/css/style.css"/>
</head>
<body>
<header class="header ">
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
        <li><a href="#置顶站点" class="move"><span>置顶推荐</span> <i class="fa fa-thumbs-o-up fa-fw"></i></a></li>
        <?php echo websort();?>
    </ul>
    <div class="main">
        <div class="card board">
            <span class="icon"><i class="fa fa-bullhorn fa-fw"></i></span>
            <marquee scrollamount="4" behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()"><span class="board-notice"><?php echo notice();?></span></marquee>        </div>