<?php require '../layout/header.php'; ?>
			<h1>Danh sách sinh viên</h1>
			<a href="../student/create.php" class="btn btn-info">Add</a>
			<form action="" method="GET">
				<label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control" value="">
				<button class="btn btn-danger">Tìm</button>
				</label>
			</form>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Mã SV</th>
						<th>Tên</th>
						<th>Ngày Sinh</th>
						<th>Giới Tính</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					require_once '../config.php';
					require_once '../connectDB.php';
					if(isset($_GET['search']))
					{
						$a = $_GET['search'];
						$sql = "SELECT * FROM student WHERE name LIKE '%$a%'";
						$result = $conn->query($sql);
						
						
					}
					else
					{

						$sql = "SELECT *FROM student";
						$result = $conn->query($sql);
					}
					
					?>
					 <?php if($result->num_rows > 0) {?>
					<?php $dem=0; foreach($result as $row) { $dem++; ?>
					<tr>

						<td><?= $dem;  ?></td>
						<td><?= $row['id'] ?> </td>
						<td><?= $row['name'] ?></td>
						<td><?= $row['birthday'] ?></td>
						<td><?= $row['gender'] ?></td>
						<td><a href="edit.html">Sửa</a></td>
						<td><a data="1" class="delete" href="list.html" type="student">Xóa</a></td>
					</tr>
					<?php } ?>
					<?php } else { 
						$dem =0; ?>
						<tr><td>không tìm thấy kết quả nào</td></tr>
						<?php } ?>
					
					
				</tbody>
			</table>
			<div>
				<span>số lượng <?=  $dem; ?> </span>
			</div>
<?php require '../layout/footer.php'; ?>

	