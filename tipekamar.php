<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

$sql = "SELECT * FROM tipe_kamar ORDER BY tipe";
$statement = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tipe Kamar</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <header>
           
        </header>

        <div class="main">
            <h1>Data Tipe Kamar</h1>
            <a href="/addtipekamar.php">Add</a>
            <a href="/dashboard.php">Menu</a>
            <br>
            <br>
            <table border="1">
                <tr>
                    <th>Tipe</th>
                    <th>Ukuran(M)</th>
                    <th>Fasilitas</th>
                    <th>Jumlah Kamar</th>
                    <th>Harga</th>
                    <th>Update</th>
                </tr>
                <?php
                    while($row = $statement->fetch()){
                        echo "<tr>";
                        echo "<td>".$row['tipe']."</td>";
                        echo "<td>".$row['ukuran']."</td>";
                        echo "<td>".$row['fasilitas']."</td>";
                        echo "<td>".$row['jumlah_kamar']."</td>";
                        echo "<td>".$row['harga']."</td>";
                        echo "<td><a href='edittipekamar.php?tipe=$row[tipe]'>Edit</a> | 
                            <a href='deletetipekamar.php?tipe=$row[tipe]'>Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>