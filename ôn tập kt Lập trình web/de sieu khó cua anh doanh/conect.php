<?php
$svn="localhost";
$user="root";
$pass="";
$db="forum";
$conn = new mysqli($svn, $user, $pass, $db);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>