<?php
/* Cố gắng kết nối đến MySQL server. Giả sử bạn đang chạy MySQL server mặc đinh (user là 'root' và không có mật khẩu */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=demo", "root", "");
    // Thiết lập PDO error mode thành ngoại lệ
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Không thể kết nối. " . $e->getMessage());
}
 
// Cố gắng thực thi truy vấn
try{
    if(isset($_REQUEST["term"])){
        // Chuẩn bị câu lệnh
        $sql = "SELECT * FROM countries WHERE name LIKE :term";
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST["term"] . '%';
        // Liên kết các tham số đến câu lệnh
        $stmt->bindParam(":term", $term);
        // Thực thi câu lệnh đã chuẩn bị
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                echo "<p style='color:red;'>" . $row["name"] . "</p>";
            }
        } else{
            echo "<p>Không tìm thấy kết quả nào</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Không thể thực thi câu lệnh $sql. " . $e->getMessage());
}
 
// Đóng câu lệnh
unset($stmt);
 
// Đóng kết nối
unset($pdo);
?>