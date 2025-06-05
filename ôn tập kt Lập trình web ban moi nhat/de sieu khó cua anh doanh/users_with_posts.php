<!DOCTYPE html>
<html>
<head>
    <title>Danh sách người dùng và bài viết</title>
</head>
<body>
    <h1>Danh sách người dùng và bài viết</h1>
    
    <?php
    // Kết nối database
    include 'conect.php';
    
    // Lấy danh sách người dùng
    $sql_users = "SELECT * FROM user";
    $result_users = $conn->query($sql_users);
    
    if ($result_users->num_rows > 0) {
        while($user = $result_users->fetch_assoc()) {
            echo "<h2>" . $user['ten'] . " (" . $user['email'] . ")</h2>";
            echo "<p>Ngày tạo: " . $user['ngaytao'] . "</p>";
            
            // Lấy bài viết của người dùng này (giả sử có cột userid trong bảng post)
            $sql_posts = "SELECT * FROM post WHERE userid = " . $user['id'];
            $result_posts = $conn->query($sql_posts);
            
            if ($result_posts->num_rows > 0) {
                echo "<h3>Bài viết:</h3>";
                echo "<ul>";
                while($post = $result_posts->fetch_assoc()) {
                    echo "<li>";
                    echo "<strong>" . $post['tieude'] . "</strong> - " . substr($post['noidung'], 0, 100) . "...";
                    echo "<br><small>Ngày đăng: " . $post['ngaytao'] . "</small>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Chưa có bài viết nào.</p>";
            }
            echo "<hr>";
        }
    } else {
        echo "Không có người dùng nào.";
    }
    
    $conn->close();
    ?>
</body>
</html>