<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>FORM TIM KIEM</h2>
    <table>
        <tr>
            <th>id</th><th>hoten</th><th>gt</th><th>ns</th><th>khoahoc</th><th>thao tac</th>
        </tr>
        <?php
            $tukhoa='';
            $arrkq[]='';
            if($_SERVER["REQUEST_METHOD"]=="POST" && isset($tukhoa['tukhoa'])){
                $tukhoa='%'.$tukhoa.'%';
                $stmt=$conn->prepare("SELECT * FROM muhaha WHERE hoten LIKE ?");
                $stmt->bind_param("s", $tukhoa);
                $stmt->execute();
                $result=$stmt->get_result();
                while($row=$result->fetch_assoc()){
                    $arrkq[]=$row;
                }
            }
        ?>
        <tr>
            <td><?= $arrkq['id']?></td>
        </tr>
    </table>


    <h2>DS SV DK</h2>
    <a href="add.php">them sv</a>
    <table border="1" cellpading="5" cellspacing="0">
        <tr>
            <th>id</th><th>hoten</th><th>gt</th><th>ns</th><th>khoahoc</th><th>thao tac</th>
        </tr>
        <?php
            $stmt=$conn->prepare("SELECT * FROM muhaha");
            $stmt->execute();
            $result=$stmt->get_result();
            while($row=$result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['hoten'] ?></td>
            <td><?= $row['gt'] ?></td>
            <td><?= $row['ns'] ?></td>
            <td><?= $row['khoahoc'] ?></td>
            <td>
                <a href="sua.php?id=<?= $row['id']?>">Sua</a>
                <a href="xoa.php?id=<?= $row['id']?>" onclick="return confirm('co muon xoa khong!')">Xoa</a>
            </td>
        </tr>
        <?php endwhile; $stmt->close(); ?>
    </table>
</body>
</html>