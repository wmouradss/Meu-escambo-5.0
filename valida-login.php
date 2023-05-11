<?php
// Inclua o arquivo de configuração do banco de dados
require 'config.php';

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');

    // Verifique se o email e senha não são nulos
    if ($email && $senha) {
        // Verifique se o usuário e a senha estão corretos
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            // Se o usuário e a senha estiverem corretos, redirecione o usuário para a página principal
            header('Location: Site-Anuncio.html');
            exit;
        } else {
            // Caso contrário, exiba uma mensagem de erro
            echo "<script>alert('Usuário ou senha incorretos'); window.history.back();</script>";
        }
    } else {
        // Exiba uma mensagem de erro se o email ou senha forem nulos
        echo "<script>alert('Usuário ou senha incorretos'); window.history.back();</script>";
    }
}
?>