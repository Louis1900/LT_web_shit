<!DOCTYPE html>
<html>
<head>
    <title>Thêm bình luận</title>
</head>
<body>
    <h1>Thêm bình luận mới</h1>
    <form action="save_comment.php" method="post">
        <label for="postid">ID bài viết:</label>
        <input type="number" id="postid" name="postid" required><br><br>
        
        <label for="userid">ID người dùng:</label>
        <input type="number" id="userid" name="userid" required><br><br>
        
        <label for="binhluan">Bình luận:</label><br>
        <textarea id="binhluan" name="binhluan" rows="3" cols="40" required></textarea><br><br>
        
        <input type="submit" value="Gửi bình luận">
    </form>
</body>
</html>