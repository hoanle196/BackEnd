<?php 
require_once '../config.php';
require_once '../connectDB.php';
var_dump($_POST);
if (isset($_POST['submit'])) {
          $name = $_POST['name'];
          $birthday = $_POST['birthday'];
          $gender = $_POST['gender'];
          // echo $name;
          if (empty($name)) {
                    $error = $loiten =  "tên không được để trống bạn ơi !";
          }
          if (strlen(trim($name)) < 3 || strlen($name) > 20) {
                    $error = $loiten = " ten tu 3 - 20 ky tu";
          }
          if (strlen($birthday) < 3 || strlen($birthday) > 10) {
                    $error = $loingay=  "Ngay sinh chưa chuẩn bạn ơi !";
          }
          if (isset($error)) {
                    echo $error;
                    header('location:create.php');
                    exit();
          }
          else
          {
                    $sql =" INSERT INTO student (name, birthday,gender)
                              VALUES ('$name','$birthday','$gender')";
                              $result = $conn->query($sql);
                              // var_dump($result);
                              // exit;
                              if($result)
                              {
                                        echo "them moi thanh cong";
                                        header('location:index.php');
                                        exit;
                              }
                              else {
                                        echo "them moi that bai";
                                          header('location:create.php');
                                          exit;

                              }
                              
          }
}
 ?>