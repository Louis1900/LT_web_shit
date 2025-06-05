<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO customer (full_name, email, phone, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_POST['full_name'], $_POST['email'], $_POST['phone'], $_POST['status']);
    $stmt->execute();
    header("Location: index.php");
}
?>
<h2>Thêm khách hàng</h2>
<form method="POST">
    Họ tên: <input name="full_name" required><br>
    Email: <input name="email" required><br>
    SĐT: <input name="phone" required><br>
    Trạng thái: 
    <select name="status" required>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select><br>
    <button type="submit">Thêm</button>
</form>
