<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : admin/sort.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$title='分类列表';
    require ('./header.php');
?>

<div class="mdui-container" style="margin-top: 4%;">
	<div class="panel panel-default">
		<div class="panel-heading"><b><?php echo $lang->admin->get_sort;?></b></div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<center>共 <b><?php echo $cntsort;?></b> 个分类</center>
			</div> 
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr style="white-space: nowrap;">
							<th class="text-center" style="width: 15%;">序号</th>
							<th class="text-center" style="width: 15%;">图标</th>
							<th class="text-center" style="width: 35%;">名称</th>
							<th class="text-center" style="width: 15%;">别名</th>
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
							$result = mysql_query("SELECT * FROM zzdh_sort order by sid asc limit $pageu,$pagesize");
							while($row = mysql_fetch_array($result))
						{
						?>
						<tr class="text-center">
							<td><?php echo  $row['sid'];?></td>
							<td><i class="fa <?php echo $row['icon'];?> fa-fw" aria-hidden="true" mdui-tooltip="{content: '<?php echo $row['icon'];?>'}"></i></td>
							<td><?php echo  $row['sortname'];?></td>
							<td><?php echo  $row['alias'];?></td>
							<td>
								<a href="./edit_sort.php?id=<?php echo $row['id'];?>" class="btn btn-xs btn-info">修改</a> 
								<a href="./del.php?from=sort&id=<?php echo $row['id'];?>" class="btn btn-xs btn-danger" onclick="javascript:return confirm('您确定要删除名称为「<?php echo $row['sortname'];?>」的分类吗？')">删除</a>
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
						echo '<li><a href="./sort.php?page='.$first.$link.'">首页</a></li>';
						echo '<li><a href="./sort.php?page='.$prev.$link.'">&laquo;</a></li>';
					} else {
						echo '<li class="disabled"><a>首页</a></li>';
						echo '<li class="disabled"><a>&laquo;</a></li>';
					}
					for ($i=1;$i<$page;$i++)
						echo '<li><a href="./sort.php?page='.$i.$link.'">'.$i .'</a></li>';
						echo '<li class="disabled"><a>'.$page.'</a></li>';
					for ($i=$page+1;$i<=$s;$i++)
						echo '<li><a href="./sort.php?page='.$i.$link.'">'.$i .'</a></li>';
						echo '';
					if ($page<$s) {
						echo '<li><a href="./sort.php?page='.$next.$link.'">&raquo;</a></li>';
						echo '<li><a href="./sort.php?page='.$last.$link.'">尾页</a></li>';
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