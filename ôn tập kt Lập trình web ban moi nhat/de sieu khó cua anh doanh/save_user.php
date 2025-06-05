<?php
// Kết nối database
include 'conect.php';

// Lấy dữ liệu từ form
$ten = $_POST['ten'];
$email = $_POST['email'];

// Thêm dữ liệu vào database
$sql = "INSERT INTO user (ten, email) VALUES ('$ten', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Thêm người dùng thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>