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
            <h1>Menu Database</h1>
            <a href="/penghuni.php">Data Penghuni</a><br>
            <a href="/tipekamar.php">Data Tipe Kamar</a><br>
            <a href="/kamar.php">Data Kamar</a><br>
            <a href="/transaksi.php">Data Transaksi</a><br>
        </div>
    </body>
</html>