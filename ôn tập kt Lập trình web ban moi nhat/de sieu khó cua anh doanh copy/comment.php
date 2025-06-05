<?php
include 'conect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postid = (int)$_POST['postid'];
    $ten = $conn->real_escape_string($_POST['ten']);
    $binhluan = $conn->real_escape_string($_POST['binhluan']);

    // Kiểm tra bài viết tồn tại
    $check = $conn->query("SELECT id FROM post WHERE id = $postid");
    if ($check->num_rows === 0) {
        echo '<p class="error">Bài viết không tồn tại.</p>';
    } else {
        $sql = "INSERT INTO comment (postid, ten, binhluan) VALUES ($postid, '$ten', '$binhluan')";
        if ($conn->query($sql)) {
            echo '<p class="success">Đã gửi bình luận thành công!</p>';
        } else {
            echo '<p class="error">Lỗi: ' . $conn->error . '</p>';
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm bình luận</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        textarea {
            height: 100px;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Thêm Bình Luận Mới</h1>

<form action="" method="post">
    <div class="form-group">
        <label for="postid">Bài viết:</label>
        <select id="postid" name="postid" required>
            <option value="">-- Chọn bài viết --</option>
            <?php
            include 'conect.php';
            $result = $conn->query("SELECT id, tieude FROM post ORDER BY id DESC");
            while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['id'].'">'.$row['tieude'].'</option>';
            }
            $conn->close();
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="ten">Tên của bạn:</label>
        <input type="text" id="ten" name="ten" required>
    </div>

    <div class="form-group">
        <label for="binhluan">Nội dung bình luận:</label>
        <textarea id="binhluan" name="binhluan" required></textarea>
    </div>

    <button type="submit" class="submit-btn">Gửi Bình Luận</button>
</form>

</body>
</html>
