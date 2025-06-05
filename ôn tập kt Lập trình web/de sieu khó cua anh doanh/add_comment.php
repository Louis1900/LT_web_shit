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
        select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea {
            height: 100px;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Thêm Bình Luận Mới</h1>
    
    <form action="save_comment.php" method="post">
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
            <label for="userid">Người bình luận:</label>
            <select id="userid" name="userid" required>
                <option value="">-- Chọn người dùng --</option>
                <?php
                include 'conect.php';
                $result = $conn->query("SELECT id, ten FROM user ORDER BY ten");
                while($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row['id'].'">'.$row['ten'].'</option>';
                }
                $conn->close();
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="binhluan">Nội dung bình luận:</label>
            <textarea id="binhluan" name="binhluan" required></textarea>
        </div>
        
        <button type="submit" class="submit-btn">Gửi Bình Luận</button>
    </form>
</body>
</html>