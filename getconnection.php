<?php

function getConnection(): PDO{
    $host = "localhost";
    $port = 5432;
    $database = "php_basdat_kos";
    $username = "postgres";
    $password = "gemmq123456";

    return new PDO("pgsql:host=$host;port=$port;dbname=$database", $username, $password);
}