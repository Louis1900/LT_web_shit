<!DOCTYPE html>
<html>
<head>
    <title>Thêm bình luận</title>
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