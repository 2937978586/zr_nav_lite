<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/add_list.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='添加站点';
    require ('./header.php');
?>

<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->add_list;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>温馨提示：序号用来排序[数字越小排名越前]，别名是指链接别名[不可重复]</center>
			</div> 
			<form action="./submit.php" method="post">
				<input type="text" value="list" name="from" style="display: none;">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">序号</span>
					<input type="number" class="form-control" placeholder="请输入站点序号[必填，且只能填数字]" aria-describedby="basic-addon1" name="lid" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">推荐</span>
					<input type="number" class="form-control" placeholder="请输入[必填，且只能填数字0或1,其中1代表推荐]" aria-describedby="basic-addon1" name="tui" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">星级</span>
					<input type="number" class="form-control" placeholder="请输入[必填，且只能填数字1或2或3或4或5]" aria-describedby="basic-addon1" name="tui" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">名称</span>
					<input type="text" class="form-control" placeholder="请输入站点名称[必填]" aria-describedby="basic-addon1" name="name" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">图片</span>
					<input type="url" class="form-control" placeholder="请输入站点图片[必填，请填写favicon.ico链接]" aria-describedby="basic-addon1" name="img" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">分类</span>
					<select name="sortname" class="form-control" required>
						<option value="">请选择站点分类[必选]</option>
						<?php
							mysql_query("set names utf8");
							$result = mysql_query("SELECT * FROM zzdh_sort order by sid asc");
							while($row = mysql_fetch_array($result))
							{
						?>
						<option value="<?=$row['sortname']?>"><?=$row['sortname']?></option>
						<?php }?> 
					</select>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">链接</span>
					<input type="url" class="form-control" placeholder="请输入站点链接[必填]" aria-describedby="basic-addon1" name="url" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">关键词</span>
					<input type="text" class="form-control" placeholder="请输入站点关键词[必填]" aria-describedby="basic-addon1" name="alias" pattern=>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">描述</span>
					<textarea rows="3" class="form-control" placeholder="请输入站点简介[必填]" aria-describedby="basic-addon1" name="introduce" required></textarea>
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