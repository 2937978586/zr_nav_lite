<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/edit_sort.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='修改分类信息';
    require ('./header.php');
?>

<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->edit_sort;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>温馨提示：序号用来排序[数字越小排名越前]，<a href="http://www.fontawesome.com.cn/faicons">Font Awesome图标</a></center>
			</div> 
			<form action="./submit.php" method="post">
				<?php
					mysql_query("set names utf8");
					$id = $_GET['id'];
					$sql = "select * from zzdh_sort where Id = '".$id."'";//查询数据库
					$result = mysql_query($sql);
					while($row = mysql_fetch_array($result))
				{	
				?>
				<input type="text" value="edit_sort" name="from" style="display: none;">
				<input type="text" value="<?php echo $id;?>" name="id" style="display: none;">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">序号</span>
					<input value="<?php echo $row['sid'];?>" type="number" class="form-control" placeholder="请输入分类序号[必填，且只能填数字]" aria-describedby="basic-addon1" name="sid" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">图标</span>
					<input value="<?php echo $row['icon'];?>" type="text" class="form-control" placeholder="请输入分类图标[必填，Font Awesome图标]" aria-describedby="basic-addon1" name="icon" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">名称</span>
					<input value="<?php echo $row['sortname'];?>" type="text" class="form-control" placeholder="请输入分类名称[必填]" aria-describedby="basic-addon1" name="sortname" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">别名</span>
					<input value="<?php echo $row['alias'];?>" type="text" class="form-control" placeholder="请输入分类别名[非必填，且只能填英文字母]" aria-describedby="basic-addon1" name="alias" pattern="[a-zA-Z]+">
				</div>
				<br>
			    <div style="text-align: center;">
			    	<input type="submit" class="btn btn-info" style="width: 80%;" value="修改">
			    </div>
				<?php }?>
			</form>
		</div>
	</div>
</div>

<?php
    require ('./footer.php');
?>