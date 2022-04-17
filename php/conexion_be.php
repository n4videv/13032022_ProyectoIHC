<?php
    include 'config.php';

    $server = constant('HOST');
    $username = constant('USER');
    $password = constant('PASSWORD');
    $database = constant('DB');
    $charset= constant('CHARSET');

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        // echo "Conectado exitosamente";
    } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
    }

?>