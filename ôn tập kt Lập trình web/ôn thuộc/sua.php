<?php
include 'connect.php';
$id=$_GET['id'];
$erros = []; // biến lỗi
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ht=$_POST['hoten'];
    $gt=$_POST['gt'];
    $ns=$_POST['ns'];
    $kh=$_POST['kh'];

    if(empty($ht)) $erros[]="k dc de trong";
    if(empty($gt)) $erros[]="k dc de trong";
    if(empty($ns)) $erros[]="k dc de trong";
    if(empty($kh)) $erros[]="k dc de trong";

    if(empty($erros)){
        $stmt=$conn->prepare("UPDATE muhaha SET hoten=?, gt=?, ns=?, khoahoc=? WHERE id=?");
        $stmt->bind_param("sssss", $ht, $gt, $ns, $kh, $id);
        if($stmt->execute()){
            echo "<script>alert('sua sv thanh cong'); window.location.href='index.php' </script>";
        }else{
            echo "<script>alert('sua sv khong thanh cong'); </script>";
        }
        $stmt->close();
    }
}
$stmt=$conn->prepare("SELECT * FROM muhaha WHERE id=?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result=$stmt->get_result()->fetch_assoc();
$khoahoc=$result['khoahoc'];
?>

<h2>FORM SUA SINH VIEN</h2>
<a href="index.php">< Quay lai</a>
<form action="" method="POST">
    hoten: <span style="color: red;">*</span> 
        <input type="text" name="hoten" value="<?= $result['hoten'] ?>" required>
    gt: <span style="color: red;">*</span> 
        <div class="radio-gr">
            <input type="radio" id="nam" name="gt" value="nam" required>
            <label for="nam">Nam</label>
            <input type="radio" id="nu" name="gt" value="nu" required>
            <label for="nu">Nu</label>
        </div>
    ns: <span style="color: red;">*</span> 
        <input type="date" name="ns" value="<?= $result['ns'] ?>" required>
    khoa hoc: <span style="color: red;">*</span> 
        <select name="kh" id="kh">
            <option value="">chon khoa hoc</option>
            <option value="lt web" <?php if($khoahoc=="lt web") echo 'selected'?>>Lap trinh web</option>
            <option value="android" <?php if($khoahoc=="android") echo 'selected'?>>Android</option>
            <option value="java" <?php if($khoahoc=="java") echo 'selected'?>>java</option>
        </select>
    <button type="submit">Sua</button>
</form>