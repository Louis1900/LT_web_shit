<?php
include 'connect.php';
$id = $_GET['id'];
$gt = $khoahoc = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $gt = $_POST['gt'];
    $khoahoc = $_POST['khoahoc'];

    $stmt = $conn->prepare("UPDATE student SET hoten=?, email=?, sdt=?, ngaysinh=?, diachi=?, gt=?, khoahoc=? WHERE id=?");
    $stmt->bind_param("sssssssi", $hoten, $email, $sdt, $ngaysinh, $diachi, $gt, $khoahoc, $id);

    if ($stmt->execute()) {
        echo "✅ Cập nhật sinh viên thành công!";
        header("Location: StudentList.php");
        exit;
    } else {echo "Lỗi: " . $stmt->error;}
}
    // Lấy dữ liệu để hiển thị form
    $stmt = $conn->prepare("SELECT * FROM student WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    // Gán giá trị để giữ trạng thái radio/select
    $khoahoc = $data['khoahoc'];
?>

<link rel="stylesheet" href="css_chophan_form.css">
<a href="StudentList.php">< Quay lại</a>
<h3>Sửa tài khoản</h3>
<form action="" method="POST">
    Họ tên: <input type="text" name="hoten" value="<?=$data['hoten'] ?>" required> <br>
    Email: <input type="text" name="email" value="<?=$data['email'] ?>" required> <br>
    SDT: <input type="text" name="sdt" value="<?=$data['sdt'] ?>" required> <br>
    Ngày sinh: <input type="date" name="ngaysinh" value="<?=$data['ngaysinh'] ?>" required> <br>
    Địa chỉ: <input type="text" name="diachi" value="<?=$data['diachi'] ?>" required> <br>
    Giới tính: <div class="radio-gr">
                <input type="radio" id="nam" name="gt" value="Nam">
                    <label for="nam">Nam</label>
                <input type="radio" id="nu" name="gt" value="Nu">
                    <label for="nu">Nu</label>
                </div> <br>
    Khóa học: <select name="khoahoc" id="khoahoc">
                <option value="">Chon khoa hoc</option>
                <option value="Phát triển web" <?php if ($khoahoc == 'Phát triển web') echo 'selected'; ?>>Phát triển web</option>
                <option value="Khoa học dữ liệu" <?php if ($khoahoc == 'Khoa học dữ liệu') echo 'selected'; ?>>Khoa học dữ liệu</option>
                <option value="Phát triển ứng dụng di động" <?php if ($khoahoc == 'Phát triển ứng dụng di động') echo 'selected'; ?>>Phát triển ứng dụng di động</option>
              </select>
    <button type="submit">Cập nhật</button>
</form>