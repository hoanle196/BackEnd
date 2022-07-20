<?php require '../layout/header.php'; ?>
			<h1>Danh sách sinh viên</h1>
			<a href="../student/create.php" class="btn btn-info">Add</a>
			<form class="search" action="" method="GET">
				<label class="form-inline justify-content-end">
					<input type="search" name="search" class="form-control" value="" placeholder="tìm kiếm...">
					<button class="btn btn-danger">Tìm</button>
				</label>
			</form>
			<div class="container wrapper">

				<div class="abc">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Mã SV</th>
							<th>Tên</th>
							<th>Ngày Sinh</th>
							<th>Giới Tính</th>
							<th>Thao Tác</th>
							<!-- <th></th> -->
						</tr>
					</thead>
					<tbody>
					<?php 
					require_once '../config.php';
					require_once '../connectDB.php';
					
					if(isset($_GET['search']))
					{
						$search = $_GET['search'];
						$pageSize = 5; // so dong tren 1 trang
						// $pageNum =1;
						isset($_GET['pageNum'])? $pageNum =$_GET['pageNum'] : $pageNum =1;
						$starRow = ($pageNum-1) * $pageSize;
						$sqlCount = "SELECT count(*) FROM student WHERE name LIKE '%$search%'";
						$obj = $conn->query($sqlCount);
						$arr = $obj->fetch_array();
						$sumRow =(int)$arr[0];// tong so dong 
						// var_dump($result);
						// exit;
						$sumPage = ceil($sumRow / $pageSize); // tong so trang 
						// var_dump($sumPage);
						// exit;
						$around =3;
						$pre = $pageNum - $around;
						if($pre <= 1)
						{
							$pre= 1;
						}
						$next = $pageNum + $around;
						if($next > $sumPage)
						{
							$next= $sumPage;
						}
						$sql = "SELECT *FROM student WHERE name LIKE '%$search%' LIMIT $starRow,$pageSize";
						$result = $conn->query($sql);
						
						
					}
					else
					{
						$pageSize = 5; // so dong tren 1 trang
						// $pageNum =1;
						isset($_GET['pageNum'])? $pageNum =$_GET['pageNum'] : $pageNum =1;
						$sqlCount = "SELECT count(*) FROM student";
						$obj = $conn->query($sqlCount);
						$arr = $obj->fetch_array();
						$sumRow =(int)$arr[0];// tong so dong 
						$sumPage = ceil($sumRow / $pageSize); // tong so trang 
						$starRow = ($pageNum-1) * $pageSize;
						// var_dump($sumPage);
						// exit;
						$around =3;
						$pre = $pageNum - $around;
						if($pre <= 1)
						{
							$pre= 1;
						}
						$next = $pageNum + $around;
						if($next > $sumPage)
						{
							$next= $sumPage;
						}
						$sql = "SELECT *FROM student LIMIT $starRow,$pageSize";
						$result = $conn->query($sql);
					}
					
					?>
					 <?php if($result->num_rows > 0) {?>
						<?php $dem=$starRow; $a=0; foreach($result as $row) { $dem++; $a++; ?>
							<tr>
								
								<td><?= $dem;  ?></td>
								<td><?= $row['id'] ?> </td>
						<td><?= $row['name'] ?></td>
						<td><?= $row['birthday'] ?></td>
						<td><?= $row['gender'] ?></td>
						<td>
							<a href="edit.php?pageNum=<?= isset($pageNum)? $pageNum :"" ?>&id=<?= $row['id'] ?>" class="btn btn-success p-2">Sửa</a>
							<a data="1" class="delete btn btn-danger p-2"  href="delete.php?pageNum=<?= isset($pageNum)? $pageNum :"" ?>&id=<?= $row['id']?>" onclick="return confirm('bạn có chắc muốn xoá ?')" type="student">Xóa</a>
						</td>
					</tr>
					<?php } ?>
					<?php } else { 
						$sumRow =0; ?>
						<tr><td>không tìm thấy kết quả nào</td></tr>
						<?php } ?>
					
						
					</tbody>
				</table>
				</div>
				
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<?php if($pageNum >1) {?>
							
							<li class="page-item"><a class="page-link" href="index.php?search=<?= isset($search)? $search :"" ?>&pageNum=1"><<</a></li>
							<li class="page-item"><a class="page-link" href="index.php?search=<?= isset($search)? $search :"" ?>&pageNum=<?= $pageNum-1 ?>"><</a></li>
							<?php } ?>
							<?php for($i= $pre; $i<=$next; $i++) { ?>
								<?php if($i == $pageNum){ ?>
									<li class="page-item"><a class="page-link bg-warning" href="index.php?search=<?= isset($search)? $search :"" ?>&pageNum=<?= $i?>"><?= $i ?></a></li>
									
									<?php } else {?>
										<li class="page-item"><a class="page-link" href="index.php?search=<?= isset($search)? $search :"" ?>&pageNum=<?= $i?>"><?= $i ?></a></li>

					<?php } ?>
					<?php } ?>
					<?php if($pageNum < $sumPage) {?>
						<li class="page-item"><a class="page-link" href="index.php?search=<?= isset($search)? $search :"" ?>&pageNum=<?= $pageNum+1 ?>">></a></li>
						<li class="page-item"><a class="page-link" href="index.php?search=<?= isset($search)? $search :"" ?>&pageNum=<?= $sumPage ?>">>></a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>
				<div>
					<span>số lượng <?=  $sumRow; ?> </span>
				</div>
				<?php require '../layout/footer.php'; ?>
				
				