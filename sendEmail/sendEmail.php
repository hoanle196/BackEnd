<?php
var_dump($_POST);
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  if (empty($email)) {
    $loi = "Ban chua nhap email";
  } else {
    $conn = new PDO("mysql:localhost=localhost;dbname=hocphp;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users WHERE email=?";
    $stsm = $conn->prepare($sql);
    $stsm->execute([$email]);
    $arr = $stsm->fetch(PDO::FETCH_ASSOC);
    $nameUser = $arr['hoten'];
    // var_dump($arr);
    echo $count = $stsm->rowCount();
    if ($count == 0) {
      $loi = "Email nay chua dc dang ky voi chung toi";
    } else {
      $newPass = substr(md5(rand(0, 99999)), 0, 6);
      $sql = "UPDATE users SET matkhau=? WHERE email=?";
      $stsm = $conn->prepare($sql);
      $stsm->execute([$newPass, $email]);
      // $arr['tendangnhap'];
      // exit();
      $kq = sendEmail($nameUser, $email, $newPass);
      $success = "Gui mail thanh cong! ban check mail de lay mat khau moi.";
      if ($kq) {
        header('location:thongbao.php');
        exit();
      } else {
        $loi = "Gửi Mail thất bại";
      }
      // echo $newPass;
    }
  }
  // echo strlen($email);

}
?>
<?php
function sendEmail($nameUser, $email, $newPass)
{
  require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
  require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
  require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
  $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
  try {
    $mail->SMTPDebug = 0;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
    $mail->isSMTP();
    $mail->CharSet  = "utf-8";
    $mail->Host = 'smtp.gmail.com';  //SMTP servers
    $mail->SMTPAuth = true; // Enable authentication
    $nguoigui = 'hoanle161996@gmail.com';
    $matkhau = 'zubhnmoxfyrqawvm';
    $tennguoigui = 'Admin-hoanle';
    $mail->Username = $nguoigui; // SMTP username
    $mail->Password = $matkhau;   // SMTP password
    $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
    $mail->Port = 465;  // port to connect to                
    $mail->setFrom($nguoigui, $tennguoigui);
    $to = $email;
    $to_name = $nameUser;

    $mail->addAddress($to, $to_name); //mail và tên người nhận  
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Thư Cấp Lại Mật Khẩu';
    $noidungthu = "<b>Chào bạn {$nameUser}</b><br>Mật khẩu mới của bạn là :{$newPass}";
    $mail->Body = $noidungthu;
    $mail->smtpConnect(array(
      "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
        "allow_self_signed" => true
      )
    ));
    $mail->send();
    return true;
  } catch (Exception $e) {
    // echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    return false;
  }
}

?>
<link rel="stylesheet" href="../phantrang/bootstrap.min.css">
<form method="POST" style="max-width:600px ;" class="m-auto container border border-primary p-3 m-3">
  <div class="mb-3 ">
    <h2 class="mb-3 sm-12 text-center">Quên mật khẩu</h2>
    <?php if (isset($loi)) { ?>
      <div class="alert alert-danger"><?php echo $loi; ?></div>
    <?php } elseif (isset($success)) { ?>
      <div class="alert alert-success"><?= $success; ?></div>

    <?php } ?>
    <label for="email" class="form-label">Gửi Email</label>
    <input type="email" value="<?php if (isset($email)) echo $email ?>" class="form-control" id="email" name="email">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Gửi Yêu Cầu </button>
</form>