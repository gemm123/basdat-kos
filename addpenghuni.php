<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

if(isset($_POST['submit'])){
    $name = $_POST['nama'];
    $asalDaerah = $_POST['asal_daerah'];
    $jenisKelamin = $_POST['jenis_kelamin'];

    require_once __DIR__ . "/getconnection.php";

    $connection = getConnection();

    $sql = "INSERT INTO penghuni(nama, asal_daerah, jenis_kelamin) VALUES('$name', '$asalDaerah', '$jenisKelamin')";
    $connection->exec($sql);

    header('Location: /penghuni.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tambah Data Penghuni</title>
        <link rel="stylesheet" href="/style/styleaddpenghuni.css">
    </head>
    <body>
        <h1>Tambah Data Penghuni</h1>
        <div class="container">
            <form action="addpenghuni.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="asaldaerah">Asal Daerah</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="asal_daerah">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                    </div>
                    <div class="col-75">
                        <p><input type="radio" name="jenis_kelamin" value="L">Laki-laki</p>
                        <p><input type="radio" name="jenis_kelamin" value="P">Perempuan</p>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Submit">
                    <a class="batal" href="penghuni.php">Batal</a>
                </div>
            </form>
        </div>
    </body>
</html>