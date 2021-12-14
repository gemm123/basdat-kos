<?php
    session_start();
    
    if($_SESSION['login'] != true){
        header('Location: /login.php');
        exit();
    }
    
    if(isset($_POST['submit'])){
        $tipe = $_POST['tipe'];
        $ukuran = $_POST['ukuran'];
        $fasilitas = $_POST['fasilitas'];
        $jumlahKamar = $_POST['jumlah_kamar'];
        $harga = $_POST['harga'];

        require_once __DIR__ . "/getconnection.php";
    
        $connection = getConnection();
    
        $sql = "INSERT INTO tipe_kamar(tipe, ukuran, fasilitas, jumlah_kamar, harga) 
                VALUES('$tipe', '$ukuran', '$fasilitas', $jumlahKamar, $harga)";
        $connection->exec($sql);
    
        header('Location: /tipekamar.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tambah Data Tipe Kamar</title>
        <link rel="stylesheet" href="/style/styleadding.css">
    </head>
    <body>
        <h1>Tambah Data Tipe Kamar</h1>
        <div class="container">
            <form action="addtipekamar.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="tipe">Tipe</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="tipe" pattern="[A-Z]{1}"
                            title="Hanya boleh 1 huruf besar">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="ukuran">Ukuran(M)</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="ukuran">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fasilitas">Fasilitas</label>
                    </div>
                    <div class="col-75">
                        <textarea name="fasilitas"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="jumlahkamar">Jumlah Kamar</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="jumlah_kamar">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="harga">Harga</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="harga">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Submit">
                    <a class="batal" href="tipekamar.php">Batal</a>
                </div>
            </form>
        </div>
    </body>
</html>