<!DOCTYPE html>
<html lang="en">
	<head></head>
		<meta charset="UTF-8">
		<title>Quản lý sinh viên</title>
		<link rel="stylesheet" href="../public/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../public/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
		<link rel="stylesheet" href="../public/css/style.css">
	</head>
	<body>
		<div class="container" style="margin-top:20px;">
			<a href="../student" class="active btn btn-info">Students</a>
			<a href="../subject" class=" btn btn-info">Subject</a>
			<a href="../register" class=" btn btn-info">Register</a>
			<div style="height:40px; margin:10px 0px 10px 0px">
				
				<?php 
			require_once '../config.php';
			require_once '../connectDB.php';
			$message ="";
			$class="";
			if(isset($_SESSION['success'])){
				$message = $_SESSION['success'];
				unset($_SESSION['success']);
				$class ="success";
			}
			elseif(isset($_SESSION['error'])){
				$message = $_SESSION['error'];
				unset($_SESSION['error']);
				$class ="danger";
				
			}
			
			?>
			<?php if($message) {?>
				<div class="mt-3 alert alert-<?= $class?>"> <?= $message ?></div>
				<?php } ?>
			</div>
				