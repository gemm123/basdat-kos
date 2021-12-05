<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

if(isset($_POST['update'])){
    $idTransaksi = $_POST['id_transaksi'];
    $nomorKamar = $_POST['nomor_kamar'];
    $id = $_POST['id'];
    $tanggalMasuk = $_POST['tanggal_masuk'];
    $tanggalKeluar = $_POST['tanggal_keluar'];

    $sql = "UPDATE transaksi SET nomor_kamar=$nomorKamar, id=$id, tanggal_masuk='$tanggalMasuk', tanggal_keluar='$tanggalKeluar'
            WHERE id_transaksi=$idTransaksi";
    $statement = $connection->exec($sql);

    header('Location: transaksi.php');
}

$idTransaksi = $_GET['id_transaksi'];

$sql = "SELECT * FROM transaksi WHERE id_transaksi=$idTransaksi";
$statement = $connection->query($sql);

while($row = $statement->fetch()){
    $idTransaksi = $row['id_transaksi'];
    $nomorKamar = $row['nomor_kamar'];
    $id = $row['id'];
    $tanggalMasuk = $row['tanggal_masuk'];
    $tanggalKeluar = $row['tanggal_keluar'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Data Transaksi</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="edittransaksi.php" method="post">
            <table border="0">
                <tr>
                    <td>Nomor Kamar</td>
                    <td><input type="number" name="nomor_kamar" value=<?= $nomorKamar ?>></td>
                </tr>
                <tr>
                    <td>Id Penghuni</td>
                    <td><input type="number" name="id" value=<?= $id ?>></td>
                </tr>
                <tr>
                    <td>Tanggl Masuk</td>
                    <td><input type="date" name="tanggal_masuk" value=<?= $tanggalMasuk ?>></td>
                </tr>
                <tr>
                    <td>Tanggal Keluar</td>
                    <td><input type="date" name="tanggal_keluar" value=<?= $tanggalKeluar ?>></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id_transaksi" value=<?= $idTransaksi ?>></td>
                    <td><input type="submit" name="update" value="Update"></td>
                    <td><a href="transaksi.php">Batal</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>