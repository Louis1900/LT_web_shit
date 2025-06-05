<!DOCTYPE html>
<html>
<head>
    <title>Thêm người dùng</title>
</head>
<body>
    <h1>Thêm người dùng mới</h1>
    <form action="save_user.php" method="post">
        <label for="ten">Tên:</label>
        <input type="text" id="ten" name="ten" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <input type="submit" value="Thêm người dùng">
    </form>
    <?php
        header("Location: index.php");
    ?>
</body>
</html>