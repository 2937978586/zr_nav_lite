<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/apply.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='申请列表';
    require ('./header.php');
?>

<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->get_apply;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>共 <b><?php echo $cntapply;?></b> 个申请</center>
			</div> 
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr style="white-space: nowrap;">
							<th class="text-center" style="width: 10%;">名称</th>
							<th class="text-center" style="width: 5%;">图片</th>
							<th class="text-center" style="width: 10%;">分类</th>
							<th class="text-center" style="width: 15%;">链接</th>
							<th class="text-center" style="width: 40%;">简介</th>
							<th class="text-center" style="width: 20%;">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$pagesize=10;
							if (!isset($_GET['page'])) {
								$page = 1;
								$pageu = $page - 1;
							} else {
								$page = $_GET['page'];
								$pageu = ($page - 1) * $pagesize;
							}
							mysql_query("set names utf8");
							$result = mysql_query("SELECT * FROM zzdh_apply order by id asc limit $pageu,$pagesize");
							while($row = mysql_fetch_array($result))
						{
						?>
						<tr class="text-center">
							<td><?php echo  $row['name'];?></td>
							<td><img src="<?php echo $row['img'];?>" width="20px" height="20px"></td>
							<td><?php echo  $row['sortname'];?></td>
							<td><a href="/go.php?url=<?php echo $row['url'];?>" title="<?php echo $row['url'];?>" target="_blank"><?php echo $row['url'];?></a></td>
							<td><?php echo  $row['introduce'];?></td>
							<td>
								<a href="./edit_apply.php?id=<?php echo $row['id'];?>" class="btn btn-xs btn-info">审核</a> 
								<a href="./del.php?from=apply&id=<?php echo $row['id'];?>" class="btn btn-xs btn-danger" onclick="javascript:return confirm('您确定要删除站点为「<?php echo $row['name'];?>」的申请吗？')">删除</a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
			<center>
				<?php
					echo'<ul class="pagination">';
					$s = ceil($cntsort / $pagesize);
					$first=1;
					$prev=$page-1;
					$next=$page+1;
					$last=$s;
					if ($page>1) {
						echo '<li><a href="./apply.php?page='.$first.$link.'">首页</a></li>';
						echo '<li><a href="./apply.php?page='.$prev.$link.'">&laquo;</a></li>';
					} else {
						echo '<li class="disabled"><a>首页</a></li>';
						echo '<li class="disabled"><a>&laquo;</a></li>';
					}
					for ($i=1;$i<$page;$i++)
						echo '<li><a href="./apply.php?page='.$i.$link.'">'.$i .'</a></li>';
						echo '<li class="disabled"><a>'.$page.'</a></li>';
					for ($i=$page+1;$i<=$s;$i++)
						echo '<li><a href="./apply.php?page='.$i.$link.'">'.$i .'</a></li>';
						echo '';
					if ($page<$s) {
						echo '<li><a href="./apply.php?page='.$next.$link.'">&raquo;</a></li>';
						echo '<li><a href="./apply.php?page='.$last.$link.'">尾页</a></li>';
					} else {
						echo '<li class="disabled"><a>&raquo;</a></li>';
						echo '<li class="disabled"><a>尾页</a></li>';
					}
						echo'</ul>';
				?>
			</center>
		</div>
    </div>
</div>

<?php
    require ('./footer.php');
?>