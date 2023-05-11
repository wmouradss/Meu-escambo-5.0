<?php

$db_name = 'armazenar_imagens';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';

try {
    $pdo2 = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_password);
    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: '.$e->getMessage();
    exit();
}