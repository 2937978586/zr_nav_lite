<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/user.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='账号信息';
    require ('./header.php');

    if(isset($_POST['weixin'])){
        if(is_uploaded_file($_FILES['weixin']['tmp_name'])){
                $arr=pathinfo($_FILES['weixin']['name']);
                $newName=  weixin;
                $fileupname=  mkdir("../img");
                if(move_uploaded_file($_FILES['weixin']['tmp_name'], "../img/{$newName}.png")){
                	exit("<script language='javascript'>alert('“微信二维码”上传成功！');window.location.href='./user.php';</script>");
                }  else {
                    exit("<script language='javascript'>alert('“微信二维码”上传失败！请检查「img」目录权限是否为777！');window.location.href='./user.php';</script>");
                }
        }else{
            exit("<script language='javascript'>alert('请选择“微信二维码”图片！');window.location.href='./user.php';</script>");
        }
	}
?>
<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->user;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>温馨提示：如果不修改密码，请在密码输入框中留空</center>
			</div> 
			<form action="./user.php" method="post">
				<?php
					if(isset($_POST['submit'])) {
						foreach ($_POST as $name => $value) {
							if($name=='pwd')continue;
							$value=daddslashes($value);
							$DB->query("insert into zzdh_config set `name`='{$name}',`main`='{$value}' on duplicate key update `main`='{$value}'");
						}
						$pwd=daddslashes($_POST['pwd']);
						if(!empty($pwd))$DB->query("update `zzdh_config` set `main` ='{$pwd}' where `name`='admin_pwd'");
						exit("<script language='javascript'>alert('修改成功！');window.location.href='./user.php';</script>");
					}else{
				?>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">账号</span>
					<input value="<?php echo $conf['admin_user'];?>" type="text" class="form-control" placeholder="请输入账号" aria-describedby="basic-addon1" name="admin_user" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Q Q</span>
					<input value="<?php echo $conf['qq'];?>" type="number" class="form-control" placeholder="请输入QQ" aria-describedby="basic-addon1" name="qq">
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">邮箱</span>
					<input value="<?php echo $conf['email'];?>" type="email" class="form-control" placeholder="请输入邮箱" aria-describedby="basic-addon1" name="email">
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">密码</span>
					<input value="" type="password" class="form-control" placeholder="不修改请留空" aria-describedby="basic-addon1" autocomplete="off" name="pwd">
				</div>
				<br>
			    <div style="text-align: center;">
			    	<input type="submit" class="btn btn-info" style="width: 80%;" name="submit" value="修改">
			    </div>
				<?php }?>
			</form>
		</div>
  	</div>
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->weixin;?></b></div>
		<div class="panel-body">
  			<div class="alert alert-info" role="alert">
				<center>温馨提示：上传图片之前请将「img」目录权限设置为：777</center>
			</div> 
			<form action="./user.php" method="post" enctype="multipart/form-data">
				<div class="input-group">
					<input type="file" name="weixin">
				</div>
				<br>
				<div style="text-align: center;">
					<input type="submit" name="weixin" class="btn btn-info" style="width: 80%;" value="上传">
				</div>
				<br>
				当前<?php echo $lang->admin->weixin;?>：<img src="../assets/images/weixin.png" style="width: 100px;">
			</form>
		</div>
	</div>
</div>
<?php
    require ('./footer.php');
?>