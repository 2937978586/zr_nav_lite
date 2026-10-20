<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/setting.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='网站信息';
    require ('./header.php');
?>

<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->setting;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>温馨提示：建站时间必须按格式填写，缩略图接口用于前台站点详情页获取站点的缩略图</center>
			</div> 
			<form action="./setting.php" method="post">
				<?php
					if(isset($_POST['submit'])) {
						foreach ($_POST as $name => $value) {
							$value=daddslashes($value);
							$DB->query("insert into zzdh_config set `name`='{$name}',`main`='{$value}' on duplicate key update `main`='{$value}'");
						}
						exit("<script language='javascript'>alert('修改成功！');window.location.href='./setting.php';</script>");
					}else{
				?>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">网站名称</span>
					<input value="<?php echo $conf['name'];?>" type="text" class="form-control" placeholder="请输入网站名称" aria-describedby="basic-addon1" name="name">
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">网站标题</span>
					<input value="<?php echo $conf['title'];?>" type="text" class="form-control" placeholder="请输入网站标题" aria-describedby="basic-addon1" name="title">
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">网站关键词</span>
					<textarea rows="2" class="form-control" placeholder="请输入网站关键词" aria-describedby="basic-addon1" name="keywords"><?php echo $conf['keywords'];?></textarea>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">网站描述</span>
					<textarea rows="2" class="form-control" placeholder="请输入网站描述" aria-describedby="basic-addon1" name="description"><?php echo $conf['description'];?></textarea>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">ICP备案号</span>
				<input value="<?php echo $conf['icp'];?>" type="text" class="form-control" placeholder="请输入ICP备案号" aria-describedby="basic-addon1" name="icp">
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">建站时间</span>
				<input value="<?php echo $conf['time'];?>" type="date" class="form-control" aria-describedby="basic-addon1" name="time">
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">缩略图接口</span>
				<input value="<?php echo $conf['api'];?>" type="url" class="form-control" placeholder="请输入缩略图接口" aria-describedby="basic-addon1" name="api">
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">底部信息</span>
					<textarea rows="3" class="form-control" placeholder="一般为统计代码" aria-describedby="basic-addon1" name="info" style="min-width:100%;max-width:100%;"><?php echo $conf['info'];?></textarea>
				</div>
				<br>
			    <div style="text-align: center;">
			    	<input type="submit" class="btn btn-info" style="width: 80%;" name="submit" value="修改">
			    </div>
				<?php }?>
			</form>
		</div>
	</div>
</div>

<?php
    require ('./footer.php');
?>