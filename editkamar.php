<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

if(isset($_POST['update'])){
    $nomorKamar = $_POST['nomor_kamar'];
    $id = $_POST['id'];
    $tipe = $_POST['tipe'];
    $ketersediaan = $_POST['ketersediaan'];

    $sql = "UPDATE kamar SET nomor_kamar=$nomorKamar, id=$id, tipe='$tipe', ketersediaan='$ketersediaan' 
            WHERE nomor_kamar=$nomorKamar";
    $statement = $connection->exec($sql);

    header('Location: /kamar.php');
}

$nomorKamar = $_GET['nomor_kamar'];
var_dump($nomorKamar);

$sql = "SELECT * FROM kamar WHERE nomor_kamar=$nomorKamar";
$statement = $connection->query($sql);

while($row = $statement->fetch()){
    $nomorKamar = $row['nomor_kamar'];
    $id = $row['id'];
    $tipe = $row['tipe'];
    $ketersediaan = $row['ketersediaan'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Data Kamar</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="editkamar.php" method="post">
            <table border="0">
            <tr>
                    <td>Nomor Kamar</td>
                    <td><input type="number" name="nomor_kamar" value=<?= $nomorKamar ?>></td>
                </tr>
                <tr>
                    <td>Id Penghuni</td>
                    <td><input type="number" name="id" value=<?= $id ?>></td>
                </tr>
                <tr>
                    <td>Tipe Kamar</td>
                    <td><input type="text" name="tipe" pattern="[A-Z]{1}"
                        title="Hanya boleh 1 huruf besar" value=<?= $tipe ?>></td>
                </tr>
                <tr>
                    <td>Ketersediaan</td>
                    <td><select name="ketersediaan">
                        <option value="Ya" <?php if($ketersediaan=='Ya') echo "selected"?>>Ya</option>
                        <option value="Tidak" <?php if($ketersediaan=='Tidak') echo "selected"?>>Tidak</option>
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