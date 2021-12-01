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
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="addpenghuni.php" method="post">
            <table width="25%" border="0">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Asal Daerah</td>
                    <td><input type="text" name="asal_daerah"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><p><input type="radio" name="jenis_kelamin" value="L">Laki-laki</p></td>
                    <td><p><input type="radio" name="jenis_kelamin" value="P">Perempuan</p></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                    <td><a href="penghuni.php">Batal</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>