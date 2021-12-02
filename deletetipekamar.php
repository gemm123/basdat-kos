<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

$tipe = $_GET['tipe'];

$sql = "DELETE FROM tipe_kamar WHERE tipe='$tipe'";
$connection->exec($sql);

header('Location: /tipekamar.php');

?>