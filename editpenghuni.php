<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['nama'];
    $asalDaerah = $_POST['asal_daerah'];
    $jenisKelamin = $_POST['jenis_kelamin'];

    $sql = "UPDATE penghuni SET nama='$name', asal_daerah='$asalDaerah', jenis_kelamin='$jenisKelamin' WHERE id=$id";
    $statement = $connection->exec($sql);

    header('Location: penghuni.php');
}

$id = $_GET['id'];

$sql = "SElECT * FROM penghuni WHERE id=$id";
$statement = $connection->query($sql);

while($row = $statement->fetch()){
    $nama = $row['nama'];
    $asalDaerah = $row['asal_daerah'];
    $jenisKelamin = trim($row['jenis_kelamin']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Data Penghuni</title>
        <link rel="stylesheet" href="/style/styleadding.css">
    </head>
    <body>
        <h1>Edit Data Penghuni</h1>
        <div class="container">
            <form action="editpenghuni.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama" value=<?= $nama ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="asaldaerah">Asal Daerah</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="asal_daerah" value=<?= $asalDaerah?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                    </div>
                    <div class="col-75">
                        <p><input type="radio" name="jenis_kelamin" value="L" <?php if($jenisKelamin=="L")echo"checked"?>>Laki-laki</p>
                        <p><input type="radio" name="jenis_kelamin" value="P" <?php if($jenisKelamin=="P")echo"checked"?>>Perempuan</p>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" name="id" value=<?= $id ?>>
                    <input type="submit" name="update" value="Submit">
                    <a class="batal" href="penghuni.php">Batal</a>
                </div>
            </form>
        </div>
    </body>
</html>