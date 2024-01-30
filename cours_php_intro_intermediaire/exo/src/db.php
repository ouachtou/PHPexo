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

#-----------------------------------------------------Functions-----------------------------------------------------#
function inserUsers($password,$name){
    $pdo = connectToDbAndPOSTPdo();
    $Password = hash('sha256', $password);
    $insertUser = $pdo-> prepare('INSERT INTO users(username, password) VALUES (:username, :password)');
    $insertUser -> execute([':password' => $Password, ':username' => $name]);
    $userInfo = $insertUser->fetch();
}

function connexionUsers($password,$name){
    $pdo = connectToDbAndPOSTPdo();
    $Password = hash('sha256', $password);
    $pdoStatement = $pdo->prepare('SELECT id FROM users WHERE username = :username AND password = :password');
    $pdoStatement->execute([":username" => $name, ":password" => $Password]);
    $userInfo = $pdoStatement->fetch();


    if ($userInfo) {
        $_SESSION['userId'] = $userInfo->id;
        header("location: game/memory/memory.php");
    }
}
?>