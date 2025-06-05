<?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ht=$_POST['hoten'];
    $gt=$_POST['gt'];
    $ns=$_POST['ns'];
    $kh=$_POST['kh'];
    //kiemtra rong
    if(empty($ht)) $erros[]="k dc de trong";
    if(empty($gt)) $erros[]="k dc de trong";
    if(empty($ns)) $erros[]="k dc de trong";
    if(empty($kh)) $erros[]="k dc de trong";
    //dien dl
    if(empty($erros)){
        $stmt=$conn->prepare("INSERT INTO muhaha(hoten, gt, ns, khoahoc) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$ht, $gt, $ns, $kh);
        if($stmt->execute()){
            echo "<script> alert('Them sv thanh cong'); window.location.href='index.php';</script>";
        }else{
            echo "<script> alert('Loi khi them')</script>";
        }
        $stmt->close();
    }
}
?>
<h2>FROM DANG KI</h2>
<form action="" method="POST">
    hoten: <span style="color: red;">*</span> 
        <input type="text" name="hoten" required>
    gt: <span style="color: red;">*</span> 
        <div class="radio-gr">
            <input type="radio" id="nam" name="gt" value="nam">
            <label for="nam">Nam</label>
            <input type="radio" id="nu" name="gt" value="nu">
            <label for="nu">Nu</label>
        </div>
    ns: <span style="color: red;">*</span> 
        <input type="date" name="ns" required>
    khoa hoc: <span style="color: red;">*</span> 
        <select name="kh" id="kh">
            <option value="">chon khoa hoc</option>
            <option value="lt web">Lap trinh web</option>
            <option value="android">Android</option>
            <option value="java">java</option>
        </select>
    <button type="submit">THem</button>
</form>
