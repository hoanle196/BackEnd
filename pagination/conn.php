<?php 
try{
          $host = "localhost";
          $dbname = "thaylongweb_tintuc";
          $username = "root";
          $password = "";
          $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
//          var_dump($conn);
}
catch(PDOException $e){
          die("lỗi:".$e->getMessage());
}

?>