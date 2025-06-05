<?php 
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        // Lấy dữ liệu từ biểu mẫu
        $hoten = trim($_POST['hoten']);
        $email = trim($_POST['email']);
        $sdt = trim($_POST['sdt']);
        $ngaysinh = trim($_POST['ngaysinh']);
        $diachi = trim($_POST['diachi']);
        $gt = isset($_POST['gt']) ? $_POST['gt'] : '';
        $khoahoc = trim($_POST['khoahoc']);

        // Kiểm tra các trường bắt buộc
        if (empty($hoten)) $errors[] = "Họ và Tên là bắt buộc.";
        if (empty($email)) $errors[] = "Email là bắt buộc.";
        if (empty($ngaysinh)) $errors[] = "Ngày sinh là bắt buộc.";
        if (empty($gt)) $errors[] = "Giới tính là bắt buộc.";
        if (empty($khoahoc)) $errors[] = "Khóa học là bắt buộc.";

        // Nếu không có lỗi, thêm dữ liệu vào cơ sở dữ liệu
        if (empty($errors)) {
            $stmt = $conn->prepare("INSERT INTO student (hoten, email, sdt, ngaysinh, diachi, gt, khoahoc) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $hoten, $email, $sdt, $ngaysinh, $diachi, $gt, $khoahoc);
            if ($stmt->execute()) {
                echo "<script>alert('Đăng ký thành công!'); window.location.href='StudentList.php';</script>";
            } else {
                echo "<script>alert('Đăng ký thất bại. Vui lòng thử lại.');</script>";
            }
            $stmt->close();
        }
    }
    $conn->close();
?>
    <link rel="stylesheet" href="css_chophan_form.css">
    <h2>QUẢN LÝ SINH VIÊN</h2>
    <form method="POST">
            Ho va ten:<span style="color:red">*</span> <input type="text" id="hoten" name="hoten" required>
            Email:<span style="color:red">*</span> <input type="text" id="email" name="email" required>
            SDT: <input type="text" id="email" name="sdt" required>
            Ngay sinh:<span style="color:red">*</span> <input type="date" id="ngaysinh" name="ngaysinh" required>
            Dia chi: <input type="text" id="email" name="diachi" required>
            Gioi tinh<span style="color: red;">*</span>
            <div class="radio-gr">
                <input type="radio" id="nam" name="gt" value="Nam">
                <label for="nam">Nam</label>
                <input type="radio" id="nu" name="gt" value="Nu">
                <label for="nu">Nu</label>
            </div>
            Khoa hoc<span style="color: red;">*</span>
            <select name="khoahoc" id="khoahoc">
                <option value="">Chon khoa hoc</option>
                <option value="Phát triển web">Phát triển web</option>
                <option value="Khoa học dữ liệu">Khoa học dữ liệu</option>
                <option value="Phát triển ứng dụng di động">Phát triển ứng dụng di động</option>
            </select>
        </div>
        <button type="submit" name="register">Đăng kí</button>
        <button type="reset">Xóa form</button>
    </form>