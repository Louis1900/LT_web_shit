<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "QLSV";
$conn = new mysqli($severname, $username, $password, $dbname);
if($conn->connect_error){
    die("Kết nối thất bại".$conn->connect_error);
}
?>