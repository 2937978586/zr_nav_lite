<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : inc/submit.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	@header('Content-Type: text/html; charset=UTF-8');
	require ('./common.php');
	$db = mysql_connect("{$dbconfig['host']}", "{$dbconfig['user']}", "{$dbconfig['pwd']}"); 
	mysql_select_db("{$dbconfig['dbname']}", $db);

	if(isset($_POST['submit'])){
		mysql_query("set names utf8");
		$name = $_POST['name'];
		$sortname = $_POST['sortid'];
		$url = $_POST['domain'];
		$alias = $meta['keywords'];
		$img = 'http://www.google.cn/s2/favicons?domain='.$url;
		$introduce = $_POST['introduce'];
		$sql = "select * from zzdh_list where url ='$url'"; 
		$result = mysql_query($sql);
		$count_list = mysql_num_rows($result);
		$sql = "select * from zzdh_apply where url ='$url'"; 
		$result = mysql_query($sql);
		$count_apply = mysql_num_rows($result);
		if($count_list != 0){
			echo "<script>alert('该站点已经存在，请勿重复提交！');history.go(-1)</script>";
		}elseif($count_apply != 0){
			echo "<script>alert('该站点已提交过，请勿重复提交！');history.go(-1)</script>";
		}else{
			$sql = "insert into zzdh_apply (name,img,sortname,url,introduce)  values('$name','$img','$sortname','$url','$introduce')";
			$result = mysql_query($sql);
			echo "<script>alert('提交成功，请耐心等待审核！');location='../apply.html';</script>";
		}
	}else{
		echo "<script>location='../apply.html';</script>";
    }
?>