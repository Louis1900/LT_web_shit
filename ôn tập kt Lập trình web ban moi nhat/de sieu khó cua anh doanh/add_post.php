<!DOCTYPE html>
<html>
<head>
    <title>Thêm bài viết mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
            height: 150px;
            resize: vertical;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            width: 100%;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Thêm Bài Viết Mới</h1>
        
        <form action="save_post.php" method="post">
            <div class="form-group">
                <label for="tieude">Tiêu đề:</label>
                <input type="text" id="tieude" name="tieude" required>
            </div>
            
            <div class="form-group">
                <label for="noidung">Nội dung:</label>
                <textarea id="noidung" name="noidung" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="userid">Tác giả:</label>
                <select id="userid" name="userid" required>
                    <option value="">-- Chọn tác giả --</option>
                    <?php
                    // Kết nối database
                    include 'conect.php';
                    
                    // Lấy danh sách người dùng
                    $result = $conn->query("SELECT id, ten FROM user ORDER BY ten");
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="'.$row['id'].'">'.$row['ten'].'</option>';
                        }
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            
            <button type="submit" class="submit-btn">ĐĂNG BÀI</button>
        </form>
    </div>
</body>
</html>