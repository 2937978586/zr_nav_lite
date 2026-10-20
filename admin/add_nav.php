<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/add_nav.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='添加导航';
    require ('./header.php');
?>

<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->add_nav;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>温馨提示：序号用来排序[数字越小排名越前]，<a href="http://www.fontawesome.com.cn/faicons" target="_blank">Font Awesome图标</a></center>
			</div> 
			<form action="./submit.php" method="post">
				<input type="text" value="nav" name="from" style="display: none;">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">序号</span>
					<input type="number" class="form-control" placeholder="请输入导航序号[必填，且只能填数字]" aria-describedby="basic-addon1" name="nid" pattern="[1-9]+[0-9]*" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">图标</span>
					<input type="text" class="form-control" placeholder="请输入导航图标[必填，Font Awesome图标]" aria-describedby="basic-addon1" name="icon" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">名称</span>
					<input type="text" class="form-control" placeholder="请输入导航名称[必填]" aria-describedby="basic-addon1" name="name" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">链接</span>
					<input type="text" class="form-control" placeholder="请输入导航链接[必填]" aria-describedby="basic-addon1" name="url" required>
				</div>
				<br>
			    <div style="text-align: center;">
					<input type="submit" class="btn btn-info" style="width: 80%;" value="添加">
			    </div>
			</form>
		</div>
	</div>
</div>
  
<?php
    require ('./footer.php');
?>