<?php 
include 'connect.php';
$id=$_GET['id'];
$sql="DELETE FROM student WHERE id=$id";
if($conn->query($sql)===TRUE){
    header("Location: StudentList.php");
}else{
    echo "Lỗi: ".$conn->error;
}
?>