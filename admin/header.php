<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/header.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	ini_set("display_errors", 0);
	require ('../inc/lang.php');
    require ('../inc/common.php');
	$db = mysql_connect("{$dbconfig['host']}", "{$dbconfig['user']}", "{$dbconfig['pwd']}");
	mysql_select_db("{$dbconfig['dbname']}", $db);
	$sql='SELECT COUNT(*) FROM zzdh_nav';
	$res=mysql_query($sql);
	list($cntnav)=mysql_fetch_row($res);
	$sql='SELECT COUNT(*) FROM zzdh_sort';
	$res=mysql_query($sql);
	list($cntsort)=mysql_fetch_row($res);
	$sql='SELECT COUNT(*) FROM zzdh_list';
	$res=mysql_query($sql);
	list($cntlist)=mysql_fetch_row($res);
	$sql='SELECT COUNT(*) FROM zzdh_apply';
	$res=mysql_query($sql);
	list($cntapply)=mysql_fetch_row($res);	
	$sql='SELECT COUNT(*) FROM zzdh_notice';
	$res=mysql_query($sql);
	list($cntnotice)=mysql_fetch_row($res);
	if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>

<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo $title; ?> - <?php echo $lang->admin->title;?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
	<link rel="shortcut icon" href="./favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome-4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" href="./style/css/bootstrap.min.css">
  	<link rel="stylesheet" href="./style/css/mdui.min.css" />
  	<link rel="stylesheet" href="./style/css/main.css" />
</head>

<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink">
	<header class="mdui-appbar mdui-appbar-fixed">
		<div class="mdui-toolbar mdui-color-theme">
			<span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
			<a href="./" class="mdui-typo-title"><?php echo $lang->admin->title;?></a>
			<div class="mdui-toolbar-spacer"></div>
			<a href="./user.php" class="mdui-ripple head-img"><img src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php echo $conf['qq'];?>&spec=100"></a>
		</div>
	</header>

	<div class="mdui-drawer mdui-color-white" id="main-drawer">
		<div class="mdui-list" mdui-collapse="{accordion: true}">
			<a href="./index.php" class="mdui-list-item">
				<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">home</i>
				<div class="mdui-list-item-content"><?php echo $lang->admin->index;?></div>
			</a>
			<div class="mdui-collapse-item ">
				<div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-purple">navigation</i>
					<div class="mdui-list-item-content"><?php echo $lang->admin->nav;?></div>
					<i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
				</div>
				<div class="mdui-collapse-item-body mdui-list">
					<a href="./nav.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->get_nav;?></a>
					<a href="./add_nav.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->add_nav;?></a>
				</div>
			</div>
			<div class="mdui-collapse-item ">
				<div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">class</i>
					<div class="mdui-list-item-content"><?php echo $lang->admin->sort;?></div>
					<i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
				</div>
				<div class="mdui-collapse-item-body mdui-list">
					<a href="./sort.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->get_sort;?></a>
					<a href="./add_sort.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->add_sort;?></a>
				</div>
			</div>
			<div class="mdui-collapse-item ">
				<div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-pink">web</i>
					<div class="mdui-list-item-content"><?php echo $lang->admin->list;?></div>
					<i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
				</div>
				<div class="mdui-collapse-item-body mdui-list">
					<a href="./list.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->get_list;?></a>
					<a href="./add_list.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->add_list;?></a>
					<a href="./apply.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->get_apply;?></a>
				</div>
			</div>
			<div class="mdui-collapse-item ">
				<div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-orange">notifications</i>
					<div class="mdui-list-item-content"><?php echo $lang->admin->notice;?></div>
					<i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
				</div>
				<div class="mdui-collapse-item-body mdui-list">
					<a href="./notice.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->get_notice;?></a>
					<a href="./add_notice.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->add_notice;?></a>
				</div>
			</div>
			<div class="mdui-collapse-item ">
				<div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-indigo">settings</i>
					<div class="mdui-list-item-content"><?php echo $lang->admin->set;?></div>
					<i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
				</div>
				<div class="mdui-collapse-item-body mdui-list">
					<a href="setting.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->setting;?></a>
					<a href="./user.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->user;?></a>
					<a href="./upimg.php" class="mdui-list-item mdui-ripple "><?php echo $lang->admin->upimg;?></a>
				</div>
			</div>
			<a href="./login.php?logout" class="mdui-list-item">
				<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-red">power_settings_new</i>
				<div class="mdui-list-item-content"><?php echo $lang->admin->logout;?></div>
			</a>
		</div>
	</div>