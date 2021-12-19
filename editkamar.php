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

    if($id != null){
        $sql = "UPDATE kamar SET nomor_kamar=$nomorKamar, id=$id, tipe='$tipe', ketersediaan='$ketersediaan' 
            WHERE nomor_kamar=$nomorKamar";
    }else{
        $sql = "UPDATE kamar SET nomor_kamar=$nomorKamar, id=null, tipe='$tipe', ketersediaan='$ketersediaan' 
            WHERE nomor_kamar=$nomorKamar";
    }

    $statement = $connection->exec($sql);

    header('Location: /kamar.php');
}

$nomorKamar = $_GET['nomor_kamar'];

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
        <link rel="stylesheet" href="/style/styleadding.css">
    </head>
    <body>
        <h1>Edit Data Kamar</h1>
        <div class="container">
            <form action="editkamar.php" method="post">
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
                        <label for="tipekamar">Tipe Kamar</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="tipe" pattern="[A-Z]{1}"
                            title="Hanya boleh 1 huruf besar" value=<?= $tipe ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="ketersediaan">Ketersediaan</label>
                    </div>
                    <div class="col-75">
                        <select name="ketersediaan">
                            <option value="Ya" <?php if($ketersediaan=='Ya') echo "selected"?>>Ya</option>
                            <option value="Tidak" <?php if($ketersediaan=='Tidak') echo "selected"?>>Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="update" value="Submit">
                    <a class="batal" href="kamar.php">Batal</a>
                </div>
            </form>
        </div>
    </body>
</html>