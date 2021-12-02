<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

$sql = "SELECT * FROM kamar ORDER BY nomor_kamar";
$statement = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Data Kamar</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Data Kamar</h1>
        <a href="addkamar.php">Add</a>
        <a href="dashboard.php">Menu</a>
        <br>
        <br>
        <table border="1">
            <tr>
                <th>Nomor Kamar</th>
                <th>Id Penghuni</th>
                <th>Tipe Kamar</th>
                <th>Ketersediaan</th>
                <th>Update</th>
            </tr>
            <?php
                while($row = $statement->fetch()){
                    echo "<tr>";
                    echo "<td>".$row['nomor_kamar']."</td>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['tipe']."</td>";
                    echo "<td>".$row['ketersediaan']."</td>";
                    echo "<td><a href='editkamar.php?nomor_kamar=$row[nomor_kamar]'>Edit</a> | 
                        <a href='deletekamar.php?nomor_kamar=$row[nomor_kamar]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>