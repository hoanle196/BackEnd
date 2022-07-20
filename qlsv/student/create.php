<?php
require '../layout/header.php';
?> 
<h1>Thêm sinh viên</h1>
<form action="store.php" method="POST">
          <div class="container">
                    <div class="row">
                              <div class="col-md-5">
                                        <div class="form-group">
                                                  <label>Tên</label>
                                                  <input type="text" name="name" class="form-control" placeholder="Tên của bạn" required name="name">
                                                  <?php if (isset($error)) { ?>
                                                            <div id="loiten" class="alert alert-danger mt-2"><?php echo $loiten; ?></div>
                                                  <?php } ?>
                                        </div>
                                        <div class="form-group">
                                                  <label>Birthday</label>
                                                  <input type="date" name="birthday" class="form-control" placeholder="Ngày sinh của bạn" required name="birthday">
                                        </div>
                                        <div class="form-group">
                                                  <label>Chọn Giới tính</label>
                                                  <select class="form-control" id="gender" name="gender" required>
                                                            <option value="nam">Nam</option>
                                                            <option value="nữ">Nữ</option>
                                                            <option value="khác">Khác</option>
                                                  </select>
                                        </div>
                                        <div class="form-group">
                                                  <button class="btn btn-success" name="submit" type="submit">Lưu</button>
                                        </div>
                              </div>
                    </div>
          </div>
</form>
<?php
require '../layout/footer.php';
?>