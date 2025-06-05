<?php 
include 'connect.php';
$sql="CREATE TABLE IF NOT EXISTS student(
            id INT AUTO_INCREMENT PRIMARY KEY,
            hoten VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            sdt VARCHAR(20),
            ngaysinh DATE NOT NULL,
            diachi TEXT,
            gt ENUM('nam', 'nu') NOT NULL,
            khoahoc VARCHAR(100) NOT NULL)";

if ($conn->query($sql) === TRUE) { 
    echo "Tạo bảng taikhoan thành công";
} else {
    echo "Lỗi khi tạo bảng: " . $conn->error;
}
$conn->close();

?>