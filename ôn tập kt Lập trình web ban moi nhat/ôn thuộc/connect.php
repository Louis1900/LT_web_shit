<?php
$servername="localhost";
$username="root";
$pass="";
$db="uhaha";
$conn=new mysqli($servername, $username, $pass, $db);
if($conn->connect_error){
    die("that bai".$conn->connect_error);
}
?>