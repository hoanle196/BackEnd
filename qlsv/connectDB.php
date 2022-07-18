<?php 
// Create connection
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD,DBNAME );
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
// echo "Kết nối thành công";
// $conn->close(); lien quan kết nối k đc đóng ngay