<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    $new_phone = $_POST['new_phone'];

    $stmt = $conn->prepare("UPDATE customer SET phone = ? WHERE status = ?");
    $stmt->bind_param("ss", $new_phone, $status);
    if ($stmt->execute()) {
        echo "✅ Đã cập nhật số điện thoại cho tất cả khách hàng có trạng thái '$status'.";
    } else {
        echo "❌ Lỗi: " . $stmt->error;
    }
}
?>
<a href="index.php">< Quay lại</a>
<form method="POST">
    Trạng thái cần cập nhật:
    <select name="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select><br>

    Số điện thoại mới: <input name="new_phone"><br>
    <button type="submit">Cập nhật</button>
</form>
