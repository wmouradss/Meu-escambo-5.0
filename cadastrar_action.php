<?php

require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$senha = filter_input(INPUT_POST, 'senha');
$senha2 = filter_input(INPUT_POST, 'confirmarsenha');
$telefone = filter_input(INPUT_POST, 'telefone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($senha === $senha2) {
    if ($nome && $email) {
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() === 0) {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, senha, telefone, email) VALUES (:nome, :senha, :telefone, :email)");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':senha', $senha);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':email', $email);
            $sql->execute();

            // Mostra o pop-up
            if (true) { // aqui, você pode adicionar uma condição que verifica se a operação foi bem-sucedida
                echo "<script>if (window.confirm('Cadastro feito com sucesso Bem vindo ao mundo do escambo')) { window.location.href = 'Site-Home.html'; }else { window.location.href = 'Site-Home.html'; }</script>";
            }

            // Redireciona para a página "Site-Home.html"
            exit;
        } else {
            echo "<script>alert('Algo deu errado! Possíveis erros: e-mail já cadastrado, senha inválida, e-mail incorreto, etc.'); window.history.back();</script>";
        }
    } else {
        header("Location: Site-Cadastro.PHP");
        exit;
    }
}
?>
