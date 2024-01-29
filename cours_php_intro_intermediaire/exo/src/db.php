<?php
function connectToDbAndPOSTPdo(): PDO
{
$dsn = 'mysql:host=mariadb;dbname=dbadmin';
$username = 'admin';
$password = 'admin';
$driver_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];
    try {
    $pdo = new PDO($dsn, $username, $password, $driver_options);
    return $pdo;
    } catch (PDOException $e) {
    echo 'La connexion à la base de données a échouée.';
    }

}
$pdo = connectToDbAndPOSTPdo();
?>