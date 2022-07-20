<?php 
require_once "../config.php";
require_once "../connectDB.php";
if(isset($_GET['id']))
{         
          
          $id =$_GET['id'];
          $sql = "DELETE FROM student WHERE id = '$id'";
          $result = $conn->query($sql);
          // var_dump($result);
          if($result)
          {
                    if(isset($_GET['pageNum']))
                    {
                              $pageNum=$_GET['pageNum'];
                              $_SESSION['success'] =" Xoá Thành công !";
                              header("location:index.php?pageNum=$pageNum");   
                              exit;    
                    }
                    
          }
          else{
                    $_SESSION['error']= "Xoá Thất Bại";
                    header('location:index.php');
          }
}
?>