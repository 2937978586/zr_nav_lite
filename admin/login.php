<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/login.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	ini_set("display_errors", 0);
	require ('../inc/lang.php');
	require ('../inc/common.php');
	if(isset($_POST['user']) && isset($_POST['pass'])){
		$user=daddslashes($_POST['user']);
		$pass=daddslashes($_POST['pass']);
		if($user==$conf['admin_user'] && $pass==$conf['admin_pwd']) {
			$session=md5($user.$pass.$password_hash);
			$token=authcode("{$user}\t{$session}", 'ENCODE', SYS_KEY);
			setcookie("admin_token", $token, time() + 604800);
			@header('Content-Type: text/html; charset=UTF-8');
			exit("<script language='javascript'>alert('登录成功！');window.location.href='./';</script>");
		}elseif ($user != $conf['admin_user'] || $pass != $conf['admin_pwd']) {
			@header('Content-Type: text/html; charset=UTF-8');
			exit("<script language='javascript'>alert('用户名或密码不正确！');window.location.href='./login.php';</script>");
		}
	}elseif(isset($_GET['logout'])){
		setcookie("admin_token", "", time() - 604800);
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('注销成功！');window.location.href='./login.php';</script>");
	}elseif($islogin==1){
		exit("<script language='javascript'>alert('您已登录！');window.location.href='./';</script>");
	}
?>

<html>
<head>
	<title><?php echo $lang->admin->login;?> - <?php echo $lang->admin->title;?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="shortcut icon" href="../favicon.ico" />
  	<link rel="stylesheet" href="./style/css/mdui.min.css" />
  	<link rel="stylesheet" href="./style/css/main.css" />
</head>

<body class="mdui-theme-primary-indigo mdui-theme-accent-blue" style="background: linear-gradient(160deg, #b100ff 20%,#00b3ff 80%);">
	<div class="login container">
		<div class="login-heading">后台登录</div>
		<div class="login-body">
			<form action="login.php" method="post" class="form-horizontal">
				<div class="mdui-textfield mdui-textfield-floating-label">
					<label class="mdui-textfield-label">用户名</label>
					<input class="mdui-textfield-input" type="text" name="user" required>
				</div>
				<div class="mdui-textfield mdui-textfield-floating-label">
					<label class="mdui-textfield-label">密码</label>
					<input class="mdui-textfield-input" type="password" name="pass" required>
				</div>
				<div class="login-btn">
					<button class="mdui-btn mdui-btn-block mdui-btn-raised mdui-ripple mdui-color-theme-accent" type="submit" name="submit">登录</button>
				</div>
			</form>
		</div>
	</div>
	<div class="login-footer">
		<?php echo $lang->admin->footer;?>
	</div>

<script type="text/javascript" src="./style/js/mdui.min.js"></script>

</body>
</html>