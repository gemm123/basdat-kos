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

    $sql = "INSERT INTO kamar(nomor_kamar, id, tipe, ketersediaan) VALUES($nomorKamar, $id, '$tipe', '$ketersediaan')";
    $connection->exec($sql);

    header('Location: /kamar.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tambah Data Kamar</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="addkamar.php" method="post">
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
                    <td>Tipe Kamar</td>
                    <td><input type="text" name="tipe" pattern="[A-Z]{1}"
                        title="Hanya boleh 1 huruf besar"></td>
                </tr>
                <tr>
                    <td>Ketersediaan</td>
                    <td><select name="ketersediaan">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                    <td><a href="kamar.php">Batal</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>