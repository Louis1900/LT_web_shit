<?php
include 'connect.php';
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE customer SET full_name=?, email=?, phone=?, status=? WHERE customer_id=?");
    $stmt->bind_param("ssssi", $_POST['full_name'], $_POST['email'], $_POST['phone'], $_POST['status'], $id);
    $stmt->execute();
    header("Location: index.php");
} else {
    $stmt = $conn->prepare("SELECT * FROM customer WHERE customer_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
}
?>
<h2>Sửa khách hàng</h2>
<form method="POST">
    Họ tên: <input name="full_name" value="<?= $data['full_name'] ?>" required><br>
    Email: <input name="email" value="<?= $data['email'] ?>" required><br>
    SĐT: <input name="phone" value="<?= $data['phone'] ?>" required><br>
    Trạng thái:
    <select name="status" required>
        <option <?= $data['status'] == "Active" ? "selected" : "" ?>>Active</option>
        <option <?= $data['status'] == "Inactive" ? "selected" : "" ?>>Inactive</option>
    </select><br>
    <button type="submit">Cập nhật</button>
</form>
