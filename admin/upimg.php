<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/upimg.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='上传图片';
    require ('./header.php');
?>

<?php
    if(isset($_POST['submit1'])){
        if(is_uploaded_file($_FILES['favicon']['tmp_name'])){
                $arr=pathinfo($_FILES['favicon']['name']);
                $newName=  favicon;
                $fileupname=  mkdir("../");
                if(move_uploaded_file($_FILES['favicon']['tmp_name'], "../{$newName}.ico")){
                	exit("<script language='javascript'>alert('“favicon图标”上传成功！');window.location.href='./upimg.php';</script>");
                }  else {
                    exit("<script language='javascript'>alert('“favicon图标”上传失败！请检查「img」目录权限是否为777！');window.location.href='./upimg.php';</script>");
                }
        }else{
            exit("<script language='javascript'>alert('请选择“favicon图标”图片！');window.location.href='./upimg.php';</script>");
        }
}
    if(isset($_POST['submit2'])){
        if(is_uploaded_file($_FILES['logo']['tmp_name'])){
                $arr=pathinfo($_FILES['logo']['name']);
                $newName=  logo;
                $fileupname=  mkdir("../assets/images");
                if(move_uploaded_file($_FILES['logo']['tmp_name'], "../assets/images/{$newName}.png")){
                	exit("<script language='javascript'>alert('“侧栏LOGO”上传成功！');window.location.href='./upimg.php';</script>");
                }  else {
                    exit("<script language='javascript'>alert('“侧栏LOGO”上传失败！请检查「img」目录权限是否为777！');window.location.href='./upimg.php';</script>");
                }
        }else{
            exit("<script language='javascript'>alert('请选择“侧栏LOGO”图片！');window.location.href='./upimg.php';</script>");
        }
}
    if(isset($_POST['submit3'])){
        if(is_uploaded_file($_FILES['mobile_logo']['tmp_name'])){
                $arr=pathinfo($_FILES['mobile_logo']['name']);
                $newName=  mobile_logo;
                $fileupname=  mkdir("../assets/images");
                if(move_uploaded_file($_FILES['mobile_logo']['tmp_name'], "../assets/images/{$newName}.png")){
                	exit("<script language='javascript'>alert('“顶栏LOGO”上传成功！');window.location.href='./upimg.php';</script>");
                }  else {
                    exit("<script language='javascript'>alert('“顶栏LOGO”上传失败！请检查「img」目录权限是否为777！');window.location.href='./upimg.php';</script>");
                }
        }else{
            exit("<script language='javascript'>alert('请选择“顶栏LOGO”图片！');window.location.href='./upimg.php';</script>");
        }
    }
    if(isset($_POST['submit4'])){
        if(is_uploaded_file($_FILES['default_ico']['tmp_name'])){
                $arr=pathinfo($_FILES['default_ico']['name']);
                $newName=  default_ico;
                $fileupname=  mkdir("../assets/images");
                if(move_uploaded_file($_FILES['default_ico']['tmp_name'], "../assets/images/{$newName}.png")){
                	exit("<script language='javascript'>alert('“默认ico图标”上传成功！');window.location.href='./upimg.php';</script>");
                }  else {
                    exit("<script language='javascript'>alert('“默认ico图标”上传失败！请检查「img」目录权限是否为777！');window.location.href='./upimg.php';</script>");
                }
        }else{
            exit("<script language='javascript'>alert('请选择“默认ico图标”图片！');window.location.href='./upimg.php';</script>");
        }
    }
    if(isset($_POST['submit5'])){
        if(is_uploaded_file($_FILES['loading']['tmp_name'])){
                $arr=pathinfo($_FILES['loading']['name']);
                $newName=  loading;
                $fileupname=  mkdir("../assets/images");
                if(move_uploaded_file($_FILES['loading']['tmp_name'], "../assets/images/{$newName}.gif")){
                	exit("<script language='javascript'>alert('“loading图”上传成功！');window.location.href='./upimg.php';</script>");
                }  else {
                    exit("<script language='javascript'>alert('“loading图”上传失败！请检查「img」目录权限是否为777！');window.location.href='./upimg.php';</script>");
                }
        }else{
            exit("<script language='javascript'>alert('请选择“loading图”图片！');window.location.href='./upimg.php';</script>");
        }
    }
    if(isset($_POST['submit6'])){
        if(is_uploaded_file($_FILES['banner']['tmp_name'])){
                $arr=pathinfo($_FILES['banner']['name']);
                $newName=  banner;
                $fileupname=  mkdir("../assets/images");
                if(move_uploaded_file($_FILES['banner']['tmp_name'], "../assets/images/{$newName}.jpg")){
                	exit("<script language='javascript'>alert('“banner图”上传成功！');window.location.href='./upimg.php';</script>");
                }  else {
                    exit("<script language='javascript'>alert('“banner图”上传失败！请检查「img」目录权限是否为777！');window.location.href='./upimg.php';</script>");
                }
        }else{
            exit("<script language='javascript'>alert('请选择“banner图”图片！');window.location.href='./upimg.php';</script>");
        }
    }
?>

<div class="mdui-container" style="margin-top: 4%;">
  	<div class="alert alert-info" role="alert">
		<center>温馨提示：上传图片不会立即在前台显示，而是会等个五六分钟后才显示的，若过久不显示请更改文件源码文件/assets/imags 上传你想要的图片然后修改对应的文件名即可</center>
	</div> 
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->favicon;?></b></div>
		<div class="panel-body">
			<form action="./upimg.php" method="post" enctype="multipart/form-data">
				<div class="input-group">
					<input type="file" name="favicon">
				</div>
				<br>
				<div style="text-align: center;">
					<input type="submit" name="submit1" class="btn btn-info" style="width: 80%;" value="上传">
				</div>
				<br>
				当前<?php echo $lang->admin->favicon;?>：<img src="../favicon.ico" style="max-width: 100%;">
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->logo;?></b></div>
		<div class="panel-body">
			<form action="./upimg.php" method="post" enctype="multipart/form-data">
				<div class="input-group">
					<input type="file" name="logo">
				</div>
				<br>
				<div style="text-align: center;">
					<input type="submit" name="submit2" class="btn btn-info" style="width: 80%;" value="上传">
				</div>
				<br>
				当前<?php echo $lang->admin->logo;?>：<img src="../assets/images/logo.png" style="max-width: 100%;">
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->mobile_logo;?></b></div>
		<div class="panel-body">
			<form action="./upimg.php" method="post" enctype="multipart/form-data">
				<div class="input-group">
					<input type="file" name="mobile_logo">
				</div>
				<br>
				<div style="text-align: center;">
					<input type="submit" name="submit3" class="btn btn-info" style="width: 80%;" value="上传">
				</div>
				<br>
				当前<?php echo $lang->admin->mobile_logo;?>：<img src="../assets/images/mobile_logo.png" style="max-width: 100%;">
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->default_ico;?></b></div>
		<div class="panel-body">
			<form action="./upimg.php" method="post" enctype="multipart/form-data">
				<div class="input-group">
					<input type="file" name="default_ico">
				</div>
				<br>
				<div style="text-align: center;">
					<input type="submit" name="submit4" class="btn btn-info" style="width: 80%;" value="上传">
				</div>
				<br>
				当前<?php echo $lang->admin->default_ico;?>：<img src="../assets/images/default_ico.png" style="max-width: 100%;">
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->loading;?></b></div>
		<div class="panel-body">
			<form action="./upimg.php" method="post" enctype="multipart/form-data">
				<div class="input-group">
					<input type="file" name="loading">
				</div>
				<br>
				<div style="text-align: center;">
					<input type="submit" name="submit5" class="btn btn-info" style="width: 80%;" value="上传">
				</div>
				<br>
				当前<?php echo $lang->admin->loading;?>：<img src="../assets/images/loading.gif" style="max-width: 100%;">
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->banner;?></b></div>
		<div class="panel-body">
			<form action="./upimg.php" method="post" enctype="multipart/form-data">
				<div class="input-group">
					<input type="file" name="banner">
				</div>
				<br>
				<div style="text-align: center;">
					<input type="submit" name="submit6" class="btn btn-info" style="width: 80%;" value="上传">
				</div>
				<br>
				当前<?php echo $lang->admin->banner;?>：<img src="../assets/images/banner.jpg" style="max-width: 100%;">
			</form>
		</div>
	</div>
</div>

<?php
    require ('./footer.php');
?>