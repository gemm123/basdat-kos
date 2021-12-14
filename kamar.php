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
        <link rel="stylesheet" href="/style/stylekamar.css">
    </head>
    <body>
        <h1>Data Kamar</h1>
        <a class="add" href="addkamar.php">Add</a>
        <a class="menu" href="dashboard.php">Menu</a>
        <br>
        <br>
        <table id="tabel">
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
                    echo "<td><a class='edit' href='editkamar.php?nomor_kamar=$row[nomor_kamar]'>Edit</a> | 
                        <a class='delete' href='deletekamar.php?nomor_kamar=$row[nomor_kamar]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>