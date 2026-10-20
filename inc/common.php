<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : inc/common.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

error_reporting(0);
define('IN_CRONLITE', true);
define('VERSION', '1001');
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
define('SYS_KEY', 'quanquan');
define('CC_Defender', 1); 

date_default_timezone_set("PRC");
$date = date("Y-m-d H:i:s");
session_start();

if(CC_Defender!=0)
	include_once SYSTEM_ROOT.'security.php';

require ROOT.'config.php';
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $sitepath . '/';
//连接数据库
include_once(SYSTEM_ROOT."db.class.php");
$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
$rs=$DB->query("select * from zzdh_config");
while($row=$DB->fetch($rs)){ 
	$conf[$row['name']]=$row['main'];
}

include_once(SYSTEM_ROOT."function.php");

include_once(SYSTEM_ROOT."member.php");