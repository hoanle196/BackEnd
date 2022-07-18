<?php 
var_dump($_POST);
if(isset($_POST['submit']))
{
         $name=$_POST['name']; 
         $password=$_POST['password']; 
         $email=$_POST['email']; 
         $avatar=$_FILES['avatar'];
         var_dump($avatar['name']);
         if(strlen($name < 10|| $name >100))
         {
          $loi = "vuot qua ky tu";
          echo $loi;
         }
         if(empty($name|| $password || $email ||$avatar))
         {
          $loi = "phai nhap du cac truong";
          echo $loi;
         }
         if($avatar['error']==0)
         {
          $exten = pathinfo($avatar['name'],PATHINFO_EXTENSION);
          echo $exten;
          // var_dump($exten);
          // exit;

         }
}
?>