<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

if(isset($_POST['update'])){
    $tipe = $_POST['tipe'];
    $ukuran = $_POST['ukuran'];
    $fasilitas = $_POST['fasilitas'];
    $jumlahKamar = $_POST['jumlah_kamar'];
    $harga = $_POST['harga'];

    $sql = "UPDATE tipe_kamar SET tipe='$tipe', ukuran='$ukuran', fasilitas='$fasilitas', jumlah_kamar=$jumlahKamar, harga=$harga 
            WHERE tipe='$tipe'";
    $statement = $connection->exec($sql);

    header('Location: /tipekamar.php');
}

$tipe = $_GET['tipe'];

$sql = "SELECT * FROM tipe_kamar WHERE tipe='$tipe'";
$statement = $connection->query($sql);

while($row = $statement->fetch()){
    $tipe = $row['tipe'];
    $ukuran = $row['ukuran'];
    $fasilitas = $row['fasilitas'];
    $jumlahKamar = $row['jumlah_kamar'];
    $harga = $row['harga'];
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
        <form action="edittipekamar.php" method="post">
            <table border="0">
            <tr>
                    <td>Tipe</td>
                    <td><input type="text" name="tipe" pattern="[A-Z]{1}"
                        title="Hanya boleh 1 huruf" value=<?= $tipe ?>></td>
                </tr>
                <tr>
                    <td>Ukuran(M)</td>
                    <td><input type="text" name="ukuran" value=<?= $ukuran ?>></td>
                </tr>
                <tr>
                    <td>Fasilitas</td>
                    <td><textarea name="fasilitas"><?= $fasilitas ?></textarea></td>
                </tr>
                <tr>
                    <td>Jumlah Kamar</td>
                    <td><input type="number" name="jumlah_kamar" value=<?= $jumlahKamar ?>></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="number" name="harga" value=<?= $harga ?>></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="update" value="Update"></td>
                    <td><a href="tipekamar.php">Batal</a></td>
                </tr>
                </tr>
            </table>
        </form>
    </body>
</html>