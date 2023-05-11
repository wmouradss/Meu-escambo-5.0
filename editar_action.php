<?php 
require 'config.php';

$id = filter_input(INPUT_POST,'id');
$nome = filter_input(INPUT_POST, 'nome');
$senha = filter_input(INPUT_POST, 'senha');
$telefone = filter_input(INPUT_POST, 'telefone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($id && $nome && $senha && $telefone && $email){
    $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, senha = :senha, telefone = :telefone, email = :email WHERE id = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':senha', $senha);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);
    $sql->execute();


    header("location: Site-Home.html");
    exit;
}else{
    header("location: Site-Home.html");
    exit;
}