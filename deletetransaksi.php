<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

$idTransaksi = $_GET['id_transaksi'];

$sql = "DELETE FROM transaksi WHERE id_transaksi=$idTransaksi";
$connection->exec($sql);

header('Location: /transaksi.php');

?>