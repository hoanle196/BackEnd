<?php 
$password = 123456;
echo "<br> ma hoa 1 :".md5( $password )."<br>";

echo strlen(md5( $password ))."<br>";
$password2 = 123456;
echo "<br> ma hoa 2 : ".password_hash($password2,PASSWORD_BCRYPT)."<br>";
$pass = password_verify($password2,password_hash($password2,PASSWORD_BCRYPT));
if($pass)
{
          echo ("mat khau khop");

}
else{
          echo("sai mat khau");
}
exit();
$passmh = substr(rand(0,999999),0,8);
$new = password_hash($passmh,PASSWORD_BCRYPT);

echo strlen(password_hash($password2,PASSWORD_BCRYPT));
// __FILE__ – Tên tập tin hiện tại.
// __DIR__ – Đường dẫn thư mục hiện tại.
// __FUNCTIONS__ – Hàm hiện tại.
// __CLASS__ – Lớp hiện tại.
// __METHOD__ - Phương thức hiện tại.
// __NAMESPACE__ 
echo __FILE__."<br>";
echo __DIR__."<br>";
// echo __FUNCTION__."<br>";
// echo __CLASS__."<br>";
// echo __METHOD__."<br>";
// echo __NAMESPACE__."<br>";
echo "<hr>";
 $arr5 = [1,2,4,5,6];
 $a = count($arr5);
echo "{$a}<br>";
$sum = 0;
$i =0;
while( $i<=$a-1)
{       
          $sum+= $arr5[$i];
          $i++;

}
echo $sum;
echo "<br>";
$arr6 = [4,2,5,7];
$size = count($arr6);
$sum2 =0;
$i =0;

do{
          $sum2 +=$arr6[$i];
          $i ++;
}
while($i <= $size-1);
echo $sum2;
$arr = [2,4,5,6];
$sum3 = 0;
$b = count($arr);
echo"<br>";
foreach($arr as $value)
{
          if($value == 4)
          {
                    continue;
          }
          $sum3 += $value;
}
echo $sum3;
