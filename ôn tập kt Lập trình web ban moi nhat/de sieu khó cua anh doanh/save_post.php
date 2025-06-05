<?php
// Kết nối database
include 'conect.php';

// Lấy dữ liệu từ form
$tieude = $conn->real_escape_string($_POST['tieude']);
$noidung = $conn->real_escape_string($_POST['noidung']);
$userid = (int)$_POST['userid'];

// Kiểm tra userid có tồn tại không
$check_user = $conn->query("SELECT id FROM user WHERE id = $userid");
if ($check_user->num_rows === 0) {
    die("Lỗi: Người dùng với ID $userid không tồn tại");
}

// Thêm dữ liệu vào database
$sql = "INSERT INTO post (tieude, noidung, userid) VALUES ('$tieude', '$noidung', $userid)";

if ($conn->query($sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>