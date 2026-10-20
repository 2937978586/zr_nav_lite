<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/submit.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

header("Content-Type:text/html;charset=utf-8");
	ini_set("display_errors", 0);
	session_start();
	mysql_query("set names utf8");
    require ('../inc/common.php');
	$db = mysql_connect("{$dbconfig['host']}", "{$dbconfig['user']}", "{$dbconfig['pwd']}"); 
	mysql_select_db("{$dbconfig['dbname']}", $db);
	if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");

	$id = $_POST['id'];
	$alias = $_POST['alias'];
	$url = $_POST['url'];
	$sql = "select * from zzdh_list where url ='$url' and id !='$id'";
	$result = mysql_query($sql);
	$count_url = mysql_num_rows($result);

	$from = $_POST['from'];
	if($from=='nav'){
      	$nid = $_POST['nid'];
		$icon = $_POST['icon'];
		$name = $_POST['name'];
		$url = $_POST['url'];
		mysql_query("set names utf8");
		$sql = "insert into zzdh_nav (nid,icon,name,url)  values('$nid','$icon','$name','$url')";
		$result = mysql_query($sql);
		echo "<script>alert('添加成功！');location='./nav.php';</script>";
	}elseif($from=='edit_nav'){
		$id = $_POST['id'];
      	$nid = $_POST['nid'];
		$icon = $_POST['icon'];
		$name = $_POST['name'];
		$url = $_POST['url'];
		$alias = $_POST['alias'];
		mysql_query("set names utf8");
		$sql = "update zzdh_nav set nid='$nid',icon='$icon',name='$name',url='$url' where Id ='$id'";
		$result = mysql_query($sql);
		echo "<script>alert('修改成功！');location='./nav.php';</script>";

	}elseif($from=='sort'){
      	$sid = $_POST['sid'];
		$icon = $_POST['icon'];
		$sortname = $_POST['sortname'];
		mysql_query("set names utf8");
		$sql = "insert into zzdh_sort (sid,icon,sortname,alias)  values('$sid','$icon','$sortname','$alias')";
		$result = mysql_query($sql);
		echo "<script>alert('添加成功！');location='./sort.php';</script>";

		
	}elseif($from=='edit_sort'){
		$id = $_POST['id'];
      	$sid = $_POST['sid'];
		$icon = $_POST['icon'];
		$sortname = $_POST['sortname'];
		$alias = $_POST['alias'];
		mysql_query("set names utf8");
		$sql = "select * from zzdh_sort where Id ='$id'"; 
		$result = mysql_query($sql);
      	$row = mysql_fetch_array($result);
		$sql = "update zzdh_sort set sid='$sid',icon='$icon',sortname='$sortname',alias='$alias' where Id ='$id'";
		$result = mysql_query($sql);
		$sql = "update zzdh_list set sortname='$sortname' where sortname ='".$row['sortname']."'";
		$result = mysql_query($sql);
		echo "<script>alert('修改成功！');location='./sort.php';</script>";
		
	}elseif($from=='list'){
      	$lid = $_POST['lid'];
      	$tui = $_POST['tui'];
      	$dj = $_POST['dj'];
		$name = $_POST['name'];
		$img = $_POST['img'];
		$sortname = $_POST['sortname'];
		$url = $_POST['url'];
		$alias = $_POST['alias'];
		$introduce = $_POST['introduce'];
		$time = time();	
    	if($count_url != 0){
        	echo "<script>alert('该站点已存在！');history.go(-1)</script>";
        }else{
			mysql_query("set names utf8");
			$sql = "insert into zzdh_list (lid,tui,dj,name,img,sortname,url,alias,introduce,time,addtime)  values('$lid','$tui','$dj','$name','$img','$sortname','$url','$alias','$introduce','$time','$time')";
			$result = mysql_query($sql);
			$sql = "delete from zzdh_apply where url ='$url'"; 
			$result = mysql_query($sql);
			echo "<script>alert('添加成功！');location='./list.php';</script>";
        }
		
	}elseif($from=='edit_list'){
		$id = $_POST['id'];
      	$lid = $_POST['lid'];
      	$tui = $_POST['tui'];
      	$dj = $_POST['dj'];
		$name = $_POST['name'];
		$img = $_POST['img'];
		$sortname = $_POST['sortname'];
		$url = $_POST['url'];
		$alias = $_POST['alias'];
		$introduce = $_POST['introduce'];
		$time = time();	
    	if($count_url != 0){
        	echo "<script>alert('该站点已存在！');history.go(-1)</script>";
        }else{
			mysql_query("set names utf8");
			$sql = "update zzdh_list set lid='$lid',tui='$tui',dj='$dj',name='$name',img='$img',sortname='$sortname',url='$url',alias='$alias',introduce='$introduce',time='$time' where Id ='$id'";
			$result = mysql_query($sql);
			echo "<script>alert('修改成功！');location='./list.php';</script>";
        }
		
	}elseif($from=='notice'){
		$content = $_POST['content'];
		mysql_query("set names utf8");
		$sql = "insert into zzdh_notice (content)  values('$content')";
		$result = mysql_query($sql);
		echo "<script>alert('添加成功！');location='./notice.php';</script>";
		
	}elseif($from=='edit_notice'){
		$id = $_POST['id'];
		$content = $_POST['content'];
		mysql_query("set names utf8");
		$sql = "update zzdh_notice set content='$content' where Id ='$id'";
		$result = mysql_query($sql);
		echo "<script>alert('修改成功！');location='./notice.php';</script>";
		
	}
	
?>