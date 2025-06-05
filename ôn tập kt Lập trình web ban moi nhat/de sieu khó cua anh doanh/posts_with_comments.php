<!DOCTYPE html>
<html>
<head>
    <title>Danh sách bài viết và bình luận</title>
</head>
<body>
    <h1>Danh sách bài viết và bình luận</h1>
    
    <?php
    // Kết nối database
    include 'conect.php';
    
    // Lấy danh sách bài viết
    $sql_posts = "SELECT * FROM post";
    $result_posts = $conn->query($sql_posts);
    
    if ($result_posts->num_rows > 0) {
        while($post = $result_posts->fetch_assoc()) {
            echo "<h2>" . $post['tieude'] . "</h2>";
            echo "<p>" . $post['noidung'] . "</p>";
            echo "<small>Ngày đăng: " . $post['ngaytao'] . "</small>";
            
            // Lấy bình luận của bài viết này
            $sql_comments = "SELECT c.*, u.ten FROM comment c JOIN user u ON c.userid = u.id WHERE c.postid = " . $post['id'];
            $result_comments = $conn->query($sql_comments);
            
            if ($result_comments->num_rows > 0) {
                echo "<h3>Bình luận:</h3>";
                echo "<ul>";
                while($comment = $result_comments->fetch_assoc()) {
                    echo "<li>";
                    echo "<strong>" . $comment['ten'] . ":</strong> " . $comment['binhluan'];
                    echo "<br><small>Ngày bình luận: " . $comment['ngaytao'] . "</small>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Chưa có bình luận nào.</p>";
            }
            echo "<hr>";
        }
    } else {
        echo "Không có bài viết nào.";
    }
    
    $conn->close();
    ?>
</body>
</html>