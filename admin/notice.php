<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/notice.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='公告列表';
    require ('./header.php');
?>

<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->get_notice;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>共 <b><?php echo $cntnotice;?></b> 条公告</center>
			</div> 
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr style="white-space: nowrap;">
							<th class="text-center" style="width: 10%;">ID</th>
							<th class="text-center" style="width: 75%;">内容</th>
							<th class="text-center" style="width: 15%;">操作</th>
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
							$result = mysql_query("SELECT * FROM zzdh_notice order by id desc limit $pageu,$pagesize");
							while($row = mysql_fetch_array($result))
						{
						?>
						<tr class="text-center">
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['content'];?></td>
							<td>
								<a href="./edit_notice.php?id=<?php echo $row['id'];?>" class="btn btn-xs btn-info">修改</a> 
								<a href="./del.php?from=notice&id=<?php echo $row['id'];?>" class="btn btn-xs btn-danger" onclick="javascript:return confirm('您确定要删除ID为「<?php echo $row['id'];?>」的公告吗？')">删除</a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
			<center>
				<?php
					echo'<ul class="pagination">';
					$s = ceil($cntnotice / $pagesize);
					$first=1;
					$prev=$page-1;
					$next=$page+1;
					$last=$s;
					if ($page>1) {
						echo '<li><a href="./notice.php?page='.$first.$link.'">首页</a></li>';
						echo '<li><a href="./notice.php?page='.$prev.$link.'">&laquo;</a></li>';
					} else {
						echo '<li class="disabled"><a>首页</a></li>';
						echo '<li class="disabled"><a>&laquo;</a></li>';
					}
					for ($i=1;$i<$page;$i++)
						echo '<li><a href="./notice.php?page='.$i.$link.'">'.$i .'</a></li>';
						echo '<li class="disabled"><a>'.$page.'</a></li>';
					for ($i=$page+1;$i<=$s;$i++)
						echo '<li><a href="./notice.php?page='.$i.$link.'">'.$i .'</a></li>';
						echo '';
					if ($page<$s) {
						echo '<li><a href="./notice.php?page='.$next.$link.'">&raquo;</a></li>';
						echo '<li><a href="./notice.php?page='.$last.$link.'">尾页</a></li>';
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