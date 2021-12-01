<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

$sql = "SELECT * FROM penghuni ORDER BY id";
$statement = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Data Penghuni</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Data Penghuni</h1>
        <a href="addpenghuni.php">Add</a>
        <a href="dashboard.php">Menu</a>
        <br>
        <br>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Asal Daerah</th>
                <th>Jenis Kelamin</th>
                <th>Update</th>
            </tr>
            <?php
                while($row = $statement->fetch()){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['asal_daerah']."</td>";
                    echo "<td>".$row['jenis_kelamin']."</td>";
                    echo "<td><a href='editpenghuni.php?id=$row[id]'>Edit</a> | 
                        <a href='deletepenghuni.php?id=$row[id]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>