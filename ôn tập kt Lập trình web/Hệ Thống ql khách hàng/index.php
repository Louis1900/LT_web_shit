<?php include 'connect.php'; ?>
<link rel="stylesheet" href="style.css">
<h2>Danh sách khách hàng</h2>
<a class="add-kh" href="add_customer.php">➕ Thêm khách hàng</a>
<a class="update-kh" href="update_customer_with_status.php">Cập nhật sdt theo trạng thái</a>
<a class="delete-kh-email" href="delete_customer_with_email.php">Xóa khách hàng theo tên miền</a>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th><th>Họ tên</th><th>Email</th><th>SĐT</th><th>Trạng thái</th><th>Hành động</th>
    </tr>
    <?php
        $stmt = $conn->prepare("SELECT * FROM customer");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $row['customer_id'] ?></td>
        <td><?= $row['full_name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
            <a href="edit_customer.php?id=<?= $row['customer_id'] ?>">Sửa</a> |
            <a href="delete_customer.php?id=<?= $row['customer_id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xoá</a>
        </td>
    </tr>
    <?php endwhile; $stmt->close(); ?>
</table>
