<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

$name = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Menu Database</title>
        <link rel="stylesheet" href="/style/styledashboard.css">
    </head>
    <body>
        <header>
            <h2>Selamat Datang, <?= $name ?></h2>
            <a href="logout.php">Logout</a>
        </header>

        <div class="main">
            <h1>MENU DATABASE</h1>
            <ul>
                <li><a class="a1" href="/penghuni.php">Data Penghuni</a></li>
                <li><a class="a2" href="/tipekamar.php">Data Tipe Kamar</a></li>
                <li><a class="a3" href="/kamar.php">Data Kamar</a></li>
                <li><a class="a4" href="/transaksi.php">Data Transaksi</a></li>
            </ul>
        </div>
    </body>
</html>