<?php
$severname = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($severname, $username, $password);
if($conn->connect_error){
    die("Kết nối thất bại".$conn->connect_error);
}

$sql="CREATE DATABASE IF NOT EXISTS QLSV ";
if($conn->query($sql) === TRUE){
    echo "Da tao thanh coong databse QLSV <br>";
}else{
    echo "Loi khi tao database".$conn->error;
}
?>