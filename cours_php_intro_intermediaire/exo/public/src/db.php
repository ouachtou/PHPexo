<?php
$dsn = 'mysql:host=mariadb;dbname=dbadmin';
$username = 'admin';
$password = 'admin';

try {
    $bdd = new PDO($dsn, $username, $password);

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>