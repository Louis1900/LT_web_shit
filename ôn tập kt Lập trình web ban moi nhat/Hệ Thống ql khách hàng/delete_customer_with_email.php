<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastemail = $_POST['lastemail'];
    
    // Thêm ký tự % vào phía trước để tìm theo đuôi tên miền 
    $like_email = '%' . $lastemail;
    //vì prepare() không nên có biến PHP trực tiếp trong SQL ('%$lastemail') → bị inject.
    //Dùng placeholder ? rồi bind_param sẽ giúp an toàn và đúng cú pháp.
    //Để xóa tên miền (đuôi email), bạn dùng LIKE ? với %@example.com.
    $stmt = $conn->prepare("DELETE FROM customer WHERE email LIKE ?");
    $stmt->bind_param("s", $like_email);

    if ($stmt->execute()) {
        echo "✅ Đã xóa tất cả khách hàng có email có tên miền '$lastemail'.";
    } else {
        echo "❌ Lỗi: " . $stmt->error;
    }
}
?>
<a href="index.php">< Quay lại</a>
<form method="POST">
    Nhập tên miền cần xóa:
    <input name="lastemail"><br>
    <button type="submit">Xóa</button>
</form>
