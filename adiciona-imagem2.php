<?php
require 'config.php';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'];

if ($email && $senha) {
  // Verifica se o usuário com esse email e senha existe na tabela de usuários
  $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
  $sql->bindValue(':email', $email);
  $sql->bindValue(':senha', $senha);
  $sql->execute();

  if ($sql->rowCount() == 1) {
    require_once "config2.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $objeto = $_POST['objeto'];
    $tempodeuso = $_POST['tempodeuso'];
    $marca = $_POST['marca'];
    $tamanho = $_POST['tamanho'];
    $avaria = $_POST['avaria'];
    $telefone = $_POST['telefone'];
    $contato = $_POST['contato'];
    $imagem_tmp = $_FILES['imagem']['tmp_name'];
    $imagem_tipo = $_FILES['imagem']['type'];

    if ($imagem_tipo == "image/jpeg") {
      $extensao = ".jpg";
    } elseif ($imagem_tipo == "image/png") {
      $extensao = ".png";
    } else {
      echo "Tipo de imagem inválido";
      exit;
    }

    $imagem_tmp = $_FILES['imagem']['tmp_name'];
    $imagem_tipo = $_FILES['imagem']['type'];
    
    if ($imagem_tipo == "image/jpeg") {
      $extensao = ".jpg";
    } elseif ($imagem_tipo == "image/png") {
      $extensao = ".png";
    } else {
      echo "Tipo de imagem inválido";
      exit;
    }
    
    $nome_arquivo = $email . '_' . uniqid() . $extensao;
    $caminho_salvar = 'D:\pasta teste\\' . $nome_arquivo;
    
    if (!move_uploaded_file($imagem_tmp, $caminho_salvar)) {
      echo "Erro ao salvar a imagem";
      exit;
    }
    
    // Inserindo dados na tabela
    $sql = "INSERT INTO artigos (email, senha, objeto, marca, tamanho, tempodeuso, avaria, telefone, contato, imagem, datahora) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $pdo2->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt->bindValue(2, $senha);
    $stmt->bindValue(3, $objeto);
    $stmt->bindValue(4, $marca);
    $stmt->bindValue(5, $tamanho);
    $stmt->bindValue(6, $tempodeuso);
    $stmt->bindValue(7, $avaria);
    $stmt->bindValue(8, $telefone);
    $stmt->bindValue(9, $contato);
    $stmt->bindValue(10, $caminho_salvar);
    
    if ($stmt->execute()) {
      echo "<script>alert('Dados cadastrados com sucesso'); window.history.back();</script>";
    } else {
      echo "Erro ao cadastrar os dados: " . implode(" - ", $stmt->errorInfo());
    }
    
    // Fechando conexão com o banco de dados
    $pdo2 = null;;
  } else {
    echo "<script>alert('Usuário e/ou senha inválidos'); window.history.back();</script>";
  }
} else {
  
  echo "<script>alert('Por favor, informe um e-mail e uma senha válidos'); window.history.back();</script>";
}
?>
