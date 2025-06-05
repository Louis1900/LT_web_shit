<?php
$servername = "localhost";
$password = "";
$database = "qlkhachhang";
$username = "root";

$conn=new mysqli($servername, $username, $password, $database);
if($conn->connect_error){
    die("Ket noi that bai".$conn->connect_error);
}
?>