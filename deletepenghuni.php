<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

$id = $_GET['id'];

$sql = "DELETE FROM penghuni WHERE id=$id";
$connection->exec($sql);

header('Location: penghuni.php');

?>