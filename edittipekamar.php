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
        <title>Edit Data Tipe Kamar</title>
        <link rel="stylesheet" href="/style/styleadding.css">
    </head>
    <body>
        <h1>Edit Data Tipe Kamar</h1>
        <div class="container">
            <form action="edittipekamar.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="tipe">Tipe</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="tipe" pattern="[A-Z]{1}"
                            title="Hanya boleh 1 huruf besar" value=<?= $tipe ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="ukuran">Ukuran(M)</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="ukuran" value=<?= $ukuran ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fasilitas">Fasilitas</label>
                    </div>
                    <div class="col-75">
                        <textarea name="fasilitas"><?= $fasilitas ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="jumlahkamar">Jumlah Kamar</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="jumlah_kamar" value=<?= $jumlahKamar ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="harga">Harga</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="harga" value=<?= $harga ?>>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="update" value="Submit">
                    <a class="batal" href="tipekamar.php">Batal</a>
                </div>
            </form>
        </div>
    </body>
</html>