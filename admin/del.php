<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/del.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	
	@header('Content-Type: text/html; charset=UTF-8');
    require ('../inc/common.php');
	$db = mysql_connect("{$dbconfig['host']}", "{$dbconfig['user']}", "{$dbconfig['pwd']}"); 
	mysql_select_db("{$dbconfig['dbname']}", $db);
	if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");

	$id = $_GET['id'];
	$from = $_GET['from'];

	if($from=='nav'){ 
		$result = mysql_query("delete from zzdh_nav where Id = {$id}");
		if($result){
			echo "<script>alert('删除成功！');location='./nav.php';</script>";
		}else{
			echo "<script>alert('删除失败！');location='./nav.php';</script>";
		}
	}elseif($from=='link'){ 
		$result = mysql_query("delete from zzdh_link where Id = {$id}");
		if($result){
			echo "<script>alert('删除成功！');location='./link.php';</script>";
		}else{
			echo "<script>alert('删除失败！');location='./link.php';</script>";
		}
	}elseif($from=='sort'){ 
		$result = mysql_query("delete from zzdh_sort where Id = {$id}");
		if($result){
			echo "<script>alert('删除成功！');location='./sort.php';</script>";
		}else{
			echo "<script>alert('删除失败！');location='./sort.php';</script>";
		}
	}elseif($from=='list'){
		$result = mysql_query("delete from zzdh_list where Id = {$id}");
		if($result){
			echo "<script>alert('删除成功！');location='./list.php';</script>";
		}else{
			echo "<script>alert('删除失败！');location='./list.php';</script>";
		}
	}elseif($from=='apply'){ 
		$result = mysql_query("delete from zzdh_apply where Id = {$id}");
		if($result){
			echo "<script>alert('删除成功！');location='./apply.php';</script>";
		}else{
			echo "<script>alert('删除失败！');location='./apply.php';</script>";
		}
	}elseif($from=='notice'){ 
		$result = mysql_query("delete from zzdh_notice where Id = {$id}");
		if($result){
			echo "<script>alert('删除成功！');location='./notice.php';</script>";
		}else{
			echo "<script>alert('删除失败！');location='./notice.php';</script>";
		}
	}

?>