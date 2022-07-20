<?php 
require_once "../config.php";
require_once "../connectDB.php";
if(isset($_GET['id']))
{
          if(isset($_GET['pageNum']))
          {
                    $pageNum = $_GET['pageNum'];
          }
          $idd = $_GET['id'];
          $sql = "SELECT * FROM student WHERE id= $idd ";
          $result = $conn->query($sql);
          // var_dump($result);
          // exit;
          if($result->num_rows >0)
          {
                    $row= $result->fetch_assoc();
                    // $a =$row['gender']=='nam';
                    // var_dump($a);
                    // exit;
               
          }

}
else
{
          header('location:index.php');
          exit;
}
?>
<?php
require '../layout/header.php';
?> 
<h1>Chỉnh sửa sinh viên</h1>
<form action="update.php?pageNum=<?= $pageNum ?>&id=<?= $idd; ?>" method="POST">
          <div class="container">
                    <div class="row">
                              <div class="col-md-5">
                                        <div class="form-group">
                                                  <label>Tên</label>
                                                  <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>">
                                                
                                        </div>
                                        <div class="form-group">
                                                  <label>Birthday</label>
                                                  <input type="date" name="birthday" class="form-control" value="<?= $row['birthday'] ?>"  required name="birthday">
                                        </div>
                                        <div class="form-group">
                                                  <label>Chọn Giới tính</label>
                                                  <select class="form-control" id="gender" name="gender" required>
                                                            <option value="nam" <?= $row['gender']=='nam'? "selected" : "" ?>>Nam</option>
                                                            <option value="nữ" <?= $row['gender']=='nữ'? "selected" : "" ?>>Nữ</option>
                                                            <option value="khác" <?= $row['gender']=='khác'? "selected" : "" ?>>Khác</option>
                                                  </select>
                                        </div>
                                        <div class="form-group">
                                                  <button class="btn btn-success" name="submit" type="submit">Lưu Update</button>
                                        </div>
                              </div>
                    </div>
          </div>
</form>
<?php
require '../layout/footer.php';
?>