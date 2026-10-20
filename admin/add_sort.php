<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/add_sort.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='添加分类';
    require ('./header.php');
?>

<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->add_sort;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>温馨提示：序号用来排序[数字越小排名越前]，<a href="http://www.fontawesome.com.cn/faicons">Font Awesome图标</a></center>
			</div> 
			<form action="./submit.php" method="post">
				<input type="text" value="sort" name="from" style="display: none;">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">序号</span>
					<input type="number" class="form-control" placeholder="请输入分类序号[必填，且只能填数字]" aria-describedby="basic-addon1" name="sid" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">图标</span>
					<input type="text" class="form-control" placeholder="请输入分类图标[必填，Font Awesome图标]" aria-describedby="basic-addon1" name="icon" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">名称</span>
					<input type="text" class="form-control" placeholder="请输入分类名称[必填]" aria-describedby="basic-addon1" name="sortname" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">别名</span>
					<input type="text" class="form-control" placeholder="请输入分类别名[非必填，且只能填英文字母]" aria-describedby="basic-addon1" name="alias" pattern="[a-zA-Z]+">
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