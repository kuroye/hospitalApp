<?php


function connect_database() {

    $dsn = 'mysql:host=localhost;dbname=hospital';
    $username = 'root';
    $password = '';

    try {
        $pdo= new PDO($dsn,$username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

?>