<?php 


if(isset($_POST['submit']))
{


         $name=$_POST['name']; 
         $password=$_POST['password']; 
         $email=$_POST['email']; 
         $avatar=$_FILES['avatar'];
         $a =($avatar['name']);
         if(strlen($name) < 6|| strlen($name) >100)
         {
          $loi = " ten k dc vuot qua ky tu";
          // echo $loi;
         }
         if(empty($name|| $password || $email ||$avatar))
         {
          $loi = "phai nhap du cac truong";
          // echo $loi;
         }
         if($avatar['error']==0)
         {
          $exten = strtolower(pathinfo($avatar['name'],PATHINFO_EXTENSION));
          // echo ($exten);
          // exit();
          $arr = ['jpg','png','jpeg','gif'];
         if(!in_array($exten,$arr))
         {
          $loi = "file upload la anh?";
         }
         //dung luon file k vuot qua 2MB

         $size= $avatar['size'];
         $max = 2* 1024*1024;
         if($size > $max)
         {
          $loi = " kich thuoc file qua lon";
         }
         }
         if(empty($loi))
         {
          try
          {
          $host= "localhost";
          $dbname = "uploads";
          $user= "root";
          $pass = "";
          $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass); 
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
          // echo "ket noi thanh cong";      
          }
          catch(PDOException $e){
                    die("loi ket noi".$e->getMessage());
          }
          $folder = "uploads";
          if(!file_exists($folder))
          {
                    mkdir($folder);
          }
          $fileName = time()."-".strtolower(basename($avatar['name']));
//          $isupload= move_uploaded_file($avatar['tmp_name'],"$folder/$filename");
         $is_upload = move_uploaded_file($avatar['tmp_name'],"$folder/$fileName");
        if( $is_upload)
        {
          $success =" upload thanh cong";
        }
        else{
          $loi =" upload that bai";
        }
        $sql = "INSERT INTO user set username=?,password=?,email=?,image=?";
        $stsm = $conn->prepare($sql);
       $obj = $stsm->execute(["$name","$password","$email","$fileName"]);

        
if($obj){
     
        header('location:thongbao.php');
        exit;     
}
else{
          
          header('location:index.php');
        exit("loi! ket noi !");   
}
         
         }
}
?>
<style> 
.image{
          display:block;
          width: 100px;
          height: 100px;
          border-radius: 50%;
          object-fit: cover;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<form action="" method="POST" name="frm1" enctype="multipart/form-data">
          <h2>Rigister</h2>
  <div class="mb-3">
    <label for="name" class="form-label">Username</label>
    <input type="name" class="form-control" id="name" name="name">
    <!-- <div class="loiten"></div> -->
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="avatar">Avatar</label>
    <input type="file" id="avatar" name="avatar">
  </div>
  <div class="loi"> <?php if(isset($loi)) echo $loi; ?></div>
 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

          $("[name=avatar]").change(function(event){      
          $('img.image').remove();
           const {files} = event.target;
           const url = window.URL.createObjectURL(files[0]);
           $('[name=avatar]').after(`<img src="${url}" class = "image" alt="">`);
          // var a= event.target;
          // var b = a.files;
          // console.log(b);
          })
</script>
<img src="" alt="">