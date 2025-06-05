<?php
$servername="localhost";
$username="root";
$pass="";
$conn=new mysqli($servername, $username, $pass);
if($conn->connect_error){
    die("that bai".$conn->connect_error);
}

$sql="CREATE DATABASE IF NOT EXISTS uhaha";
if($conn->query($sql)===TRUE){
    echo "Tao thanh cong";
}else{
    echo "tao that bai".$conn->error;
}
?>