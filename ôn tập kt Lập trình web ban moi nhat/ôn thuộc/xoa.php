<?php
include 'connect.php';
$id=$_GET['id'];
$stmt=$conn->prepare("DELETE FROM muhaha WHERE id=?");
$stmt->bind_param("s", $id);
$stmt->execute();
header("Location: index.php");
?>