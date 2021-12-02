<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['nama'];
    $asalDaerah = $_POST['asal_daerah'];
    $jenisKelamin = $_POST['jenis_kelamin'];

    $sql = "UPDATE penghuni SET nama='$name', asal_daerah='$asalDaerah', jenis_kelamin='$jenisKelamin' WHERE id=$id";
    $statement = $connection->exec($sql);

    header('Location: penghuni.php');
}

$id = $_GET['id'];

$sql = "SElECT * FROM penghuni WHERE id=$id";
$statement = $connection->query($sql);

while($row = $statement->fetch()){
    $nama = $row['nama'];
    $asalDaerah = $row['asal_daerah'];
    $jenisKelamin = trim($row['jenis_kelamin']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Data Penghuni</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="editpenghuni.php" method="post">
            <table border="0">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="nama" value=<?= $nama ?>></td>
                </tr>
                <tr>
                    <td>Asal Daerah</td>
                    <td><input type="text" name="asal_daerah" value=<?= $asalDaerah?>></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><input type="radio" name="jenis_kelamin" value="L" <?php if($jenisKelamin=="L")echo"checked"?>>Laki-laki</td>
                    <td><input type="radio" name="jenis_kelamin" value="P" <?php if($jenisKelamin=="P")echo"checked"?>>Perempuan</td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value=<?= $id ?>></td>
                    <td><input type="submit" name="update" value="Update"></td>
                    <td><a href="penghuni.php">Batal</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>