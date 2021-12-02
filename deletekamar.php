<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

$nomorKamar = $_GET['nomor_kamar'];

$sql = "DELETE FROM kamar WHERE nomor_kamar=$nomorKamar";
$connection->exec($sql);

header('Location: /kamar.php');

?>