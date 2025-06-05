<?php
// Kết nối database
include 'conect.php';

// Lấy dữ liệu từ form
$postid = (int)$_POST['postid'];
$userid = (int)$_POST['userid'];
$binhluan = $conn->real_escape_string($_POST['binhluan']);

// Kiểm tra postid có tồn tại không
$check_post = $conn->query("SELECT id FROM post WHERE id = $postid");
if ($check_post->num_rows === 0) {
    die("Lỗi: Bài viết với ID $postid không tồn tại");
}

// Kiểm tra userid có tồn tại không
$check_user = $conn->query("SELECT id FROM user WHERE id = $userid");
if ($check_user->num_rows === 0) {
    die("Lỗi: Người dùng với ID $userid không tồn tại");
}

// Thêm dữ liệu vào database
$sql = "INSERT INTO comment (postid, userid, binhluan) VALUES ($postid, $userid, '$binhluan')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>