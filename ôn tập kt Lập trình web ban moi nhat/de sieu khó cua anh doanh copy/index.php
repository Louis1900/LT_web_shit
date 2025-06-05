<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ - Hệ thống User và Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            display: flex;
            gap: 20px;
        }
        .section {
            flex: 1;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        h2 {
            color: #444;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        .user-list, .post-list {
            margin-top: 10px;
        }
        .user-item, .post-item {
            padding: 10px;
            margin-bottom: 10px;
            background-color: white;
            border-radius: 3px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .user-name {
            font-weight: bold;
            color: #2c3e50;
        }
        .user-email {
            color: #7f8c8d;
            font-size: 0.9em;
        }
        .post-title {
            font-weight: bold;
            color: #2980b9;
        }
        .post-content {
            color: #34495e;
            margin: 5px 0;
        }
        .date {
            font-size: 0.8em;
            color: #95a5a6;
        }
        .nav {
            margin-bottom: 20px;
            text-align: center;
        }
        .nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #3498db;
        }
    </style>
</head>
<body>
    <h1>Hệ thống Quản lý Người dùng và Bài viết</h1>
    
    <div class="nav">
        <a href="user.php">Thêm người dùng</a>
        <a href="post.php">Thêm bài viết</a>
        <a href="users_with_posts.php">Xem người dùng + bài viết</a>
        <a href="posts_with_comments.php">Xem bài viết + bình luận</a>
    </div>
    
    <div class="container">
        <!-- Danh sách người dùng -->
        <div class="section">
            <h2>Danh sách Người dùng</h2>
            <div class="user-list">
                <?php
                include 'conect.php';
                
                // Lấy danh sách người dùng
                $sql_users = "SELECT * FROM user ORDER BY ngaytao DESC LIMIT 5";
                $result_users = $conn->query($sql_users);
                
                if ($result_users->num_rows > 0) {
                    while($user = $result_users->fetch_assoc()) {
                        echo '<div class="user-item">';
                        echo '<div class="user-name">' . htmlspecialchars($user['ten']) . '</div>';
                        echo '<div class="user-email">' . htmlspecialchars($user['email']) . '</div>';
                        echo '<div class="date">Đăng ký: ' . $user['ngaytao'] . '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Không có người dùng nào.</p>';
                }
                
                echo '</div>';
                echo '<div style="text-align: center; margin-top: 10px;">';
                echo '<a href="users_with_posts.php">Xem tất cả người dùng</a>';
                echo '</div>';
                ?>
            </div>
        </div>
        
        <!-- Danh sách bài viết -->
        <div class="section">
            <h2>Danh sách Bài viết mới</h2>
            <div class="post-list">
                <?php
                // Lấy danh sách bài viết
                $sql_posts = "SELECT * FROM post ORDER BY ngaytao DESC LIMIT 5";
                $result_posts = $conn->query($sql_posts);
                
                if ($result_posts->num_rows > 0) {
                    while($post = $result_posts->fetch_assoc()) {
                        echo '<div class="post-item">';
                        echo '<div class="post-title">' . htmlspecialchars($post['tieude']) . '</div>';
                        echo '<div class="post-content">' . substr(htmlspecialchars($post['noidung']), 0, 100) . '...</div>';
                        echo '<div class="date">Đăng ngày: ' . $post['ngaytao'] . '</div>';
                        echo '</div>';
                        
                    }
                } else {
                    echo '<p>Không có bài viết nào.</p>';
                }
                
                $conn->close();
                ?>
            </div>
            <div style="text-align: center; margin-top: 10px;">
                <a href="posts_with_comments.php">Xem tất cả bài viết</a>
            </div>
        </div>
    </div>
</body>
</html>