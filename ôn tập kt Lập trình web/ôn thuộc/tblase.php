<?php
include 'connect.php';
$sql="CREATE TABLE IF NOT EXISTS muhaha";
if($conn->query($sql)===TRUE){
    echo "Tao bang thanh cong";
}else{
    echo "tao bang that bai".$conn->error;
}
?>