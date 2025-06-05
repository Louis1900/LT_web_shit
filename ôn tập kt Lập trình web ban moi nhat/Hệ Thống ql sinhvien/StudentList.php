<?php
include 'connect.php';
$sql="SELECT * FROM student";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <a href="StudentRegister.php">Đăng kí SV</a>
    <h2>Danh sách Student</h2>
    <table border="5" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>ho ten</th>
            <th>Email</th>
            <th>SDT</th>
            <th>Ngay sinh</th>
            <th>Dia chi</th>
            <th>Gioi tinh</th>
            <th>Khoa hoc</th>
            <th></th>
            
        </tr>
        <?php
            while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['hoten']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['sdt']}</td>
                    <td>{$row['ngaysinh']}</td>
                    <td>{$row['diachi']}</td>
                    <td>{$row['gt']}</td>
                    <td>{$row['khoahoc']}</td>
                    <td>
                        <a class=\"nutsua\" href='UpdateStudent.php?id={$row['id']}'>Sửa</a>
                        <a class=\"nutxoa\" href='Delete.php?id={$row['id']}' onclick=\"return confirm('Xac nhan xoa!')\">Xoa</a> 
                    </td>
                </tr>";
            }
            $conn->close();
        ?>
    </table>
    
</body>
</html>