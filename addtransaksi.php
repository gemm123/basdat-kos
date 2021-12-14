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
        <link rel="stylesheet" href="/style/styleadding.css">
    </head>
    <body>
        <h1>Tambah Data Transaksi</h1>
        <div class="container">
            <form action="addkamar.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="nomorkamar">Nomor Kamar</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="nomor_kamar">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="idpenghuni">Id Penghuni</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="id">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="tanggalmasuk">Tanggal Masuk</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name="tanggal_masuk">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="tanggalkeluar">Tanggal Keluar</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name="tanggal_keluar">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Submit">
                    <a class="batal" href="transaksi.php">Batal</a>
                </div>
            </form>
        </div>
    </body>
</html>