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
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="addtipekamar.php" method="post">
            <table width="25%" border="0">
                <tr>
                    <td>Tipe</td>
                    <td><input type="text" name="tipe" pattern="[A-Z]{1}"
                        title="Hanya boleh 1 huruf besar"></td>
                </tr>
                <tr>
                    <td>Ukuran(M)</td>
                    <td><input type="text" name="ukuran"></td>
                </tr>
                <tr>
                    <td>Fasilitas</td>
                    <td><textarea name="fasilitas"></textarea></td>
                </tr>
                <tr>
                    <td>Jumlah Kamar</td>
                    <td><input type="number" name="jumlah_kamar"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="number" name="harga"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                    <td><a href="tipekamar.php">Batal</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>