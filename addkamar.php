<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

if(isset($_POST['submit'])){
    $nomorKamar = $_POST['nomor_kamar'];
    $id = $_POST['id'];
    $tipe = $_POST['tipe'];
    $ketersediaan = $_POST['ketersediaan'];

    require_once __DIR__ . "/getconnection.php";

    $connection = getConnection();

    if($id != null){
        $sql = "INSERT INTO kamar(nomor_kamar, id, tipe, ketersediaan) VALUES($nomorKamar, $id, '$tipe', '$ketersediaan')";
    }else{
        $sql = "INSERT INTO kamar(nomor_kamar, tipe, ketersediaan) VALUES($nomorKamar, '$tipe', '$ketersediaan')";
    }

    $connection->exec($sql);

    header('Location: /kamar.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tambah Data Kamar</title>
        <link rel="stylesheet" href="/style/styleadding.css">
    </head>
    <body>
        <h1>Tambah Data Kamar</h1>
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
                        <label for="tipekamar">Tipe Kamar</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="tipe" pattern="[A-Z]{1}"
                            title="Hanya boleh 1 huruf besar">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="ketersediaan">Ketersediaan</label>
                    </div>
                    <div class="col-75">
                        <select name="ketersediaan">
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Submit">
                    <a class="batal" href="kamar.php">Batal</a>
                </div>
            </form>
        </div>
    </body>
</html>