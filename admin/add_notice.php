<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/add_notice.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='发布公告';
    require ('./header.php');
?>

<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->add_notice;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>温馨提示：网站前台只会显示最新的一条公告</center>
			</div> 
			<form action="./submit.php" method="post">
				<input type="text" value="notice" name="from" style="display: none;">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">内容</span>
					<textarea rows="5" class="form-control" placeholder="请输入公告内容[必填]" aria-describedby="basic-addon1" name="content" required></textarea>
				</div>
				<br>
				<div style="text-align: center;">
					<input type="submit" class="btn btn-info" style="width: 80%;" value="发布">
				</div>
			</form>
		</div>
	</div>
</div>

<?php
    require ('./footer.php');
?>