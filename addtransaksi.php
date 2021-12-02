<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

if(isset($_POST['submit'])){
    $nomorKamar = $_POST['nomor_kamar'];
    $id = $_POST['id'];
    $tanggalMasuk = $_POST['tanggal_masuk'];
    $tanggalKeluar = $_POST['tanggal_keluar'];

    require_once __DIR__ . "/getconnection.php";

    $connection = getConnection();

    $sql = "INSERT INTO transaksi(nomor_kamar, id, tanggal_masuk, tanggal_keluar) 
            VALUES($nomorKamar, $id, '$tanggalMasuk', '$tanggalKeluar')";
    $connection->exec($sql);

    header('Location: /transaksi.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tambah Data Transaksi</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="addtransaksi.php" method="post">
            <table width="25%" border="0">
                <tr>
                    <td>Nomor Kamar</td>
                    <td><input type="number" name="nomor_kamar"></td>
                </tr>
                <tr>
                    <td>Id Penghuni</td>
                    <td><input type="number" name="id"></td>
                </tr>
                <tr>
                    <td>Tanggl Masuk</td>
                    <td><input type="date" name="tanggal_masuk"></td>
                </tr>
                <tr>
                    <td>Tanggal Keluar</td>
                    <td><input type="date" name="tanggal_keluar"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                    <td><a href="transaksi.php">Batal</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>