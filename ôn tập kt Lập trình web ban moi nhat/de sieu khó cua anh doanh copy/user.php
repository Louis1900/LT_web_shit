<?php
include 'conect.php';
// Xử lý khi submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten = $_POST['ten'];
    $email = $_POST['email'];

    // Kiểm tra rỗng
    if (!empty($ten) && !empty($email)) {
        $stmt = $conn->prepare("INSERT INTO user (ten, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $ten, $email);

        if ($stmt->execute()) {
            echo "<script>alert('Thêm người dùng thành công!'); window.location.href='index.php';</script>";
            exit;
        } else {
            $error = "Lỗi khi thêm người dùng: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error = "Vui lòng điền đầy đủ thông tin.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm người dùng</title>
</head>
<body>
    <h1>Thêm người dùng mới</h1>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><strong><?= $error ?></strong></p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="ten">Tên:</label>
        <input type="text" id="ten" name="ten" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <input type="submit" value="Thêm người dùng">
    </form>
</body>
</html>
