<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/edit_notice.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='修改公告内容';
    require ('./header.php');
?>

<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->edit_notice;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>温馨提示：网站前台只会显示最新的一条公告</center>
			</div> 
			<form action="./submit.php" method="post">
				<?php
					mysql_query("set names utf8");
					$id = $_GET['id'];
					$sql = "select * from zzdh_notice where Id = '".$id."'";
					$result = mysql_query($sql);
					while($row = mysql_fetch_array($result))
				{	
				?>
				<input type="text" value="edit_notice" name="from" style="display: none;">
				<input type="text" value="<?php echo $id;?>" name="id" style="display: none;">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">内容</span>
					<textarea rows="5" class="form-control" placeholder="请输入公告内容[必填]" aria-describedby="basic-addon1" name="content" required><?php echo $row['content'];?></textarea>
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