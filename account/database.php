<?php
    //Usando PDO!!! NO USAR nada relacionado a MYSQLI porque NO FUNCIONA

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'qatarclic';

    try{
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
    }
    catch(PDOException $e){
        die('Connection Failed: '.$e->getMessage());
    }
?>