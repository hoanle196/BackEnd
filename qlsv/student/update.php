<?php 
require_once '../config.php';
require_once '../connectDB.php';
if(isset($_GET['id']))
{
   if(isset($_GET['pageNum']))
   {
     $pageNum = $_GET['pageNum'];
   }
          $id = $_GET['id'];
         if(isset($_POST['submit']))
          {
          $name=$_POST['name'];
          $birthday=$_POST['birthday'];
          $gender=$_POST['gender'];
          $sql= "UPDATE student set name='$name',birthday='$birthday',gender='$gender' WHERE id = $id";
          $result = $conn->query($sql);
          // var_dump($result);
          // exit;
          if($result)
          {    
            $pageNum = $_GET['pageNum'];
            $_SESSION['success']= "Update Thành công !";
                header("location:index.php?pageNum=$pageNum");
                exit;
                
          }
          else
          {
                     $_SESSION['error']= "Update thất bại !".$conn->error;
                     header('location:index.php');
                     exit;
                  //   die("loi cau truy van".$sql.$conn->error);

          }

          }   
}
else
{
          header('location:index.php');
          exit;
}


?>