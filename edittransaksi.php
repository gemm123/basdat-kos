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
        <link rel="stylesheet" href="/style/styleadding.css">
    </head>
    <body>
        <h1>Edit Data Transaksi</h1>
        <div class="container">
            <form action="edittransaksi.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="nomorkamar">Nomor Kamar</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="nomor_kamar" value=<?= $nomorKamar ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="idpenghuni">Id Penghuni</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="id" value=<?= $id ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="tanggalmasuk">Tanggal Masuk</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name="tanggal_masuk" value=<?= $tanggalMasuk ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="tanggalkeluar">Tanggal Keluar</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name="tanggal_keluar" value=<?= $tanggalKeluar ?>>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" name="id_transaksi" value=<?= $idTransaksi ?>>
                    <input type="submit" name="update" value="Submit">
                    <a class="batal" href="transaksi.php">Batal</a>
                </div>
            </form>
        </div>
    </body>
</html>