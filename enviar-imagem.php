<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Escambo</title>
    <link rel="stylesheet" type="text/css" href="stylemeuescambo.css">
</head>
<body>
    <div id="logomarca">
        <img src="img/logo.png" alt="logo">
    </div>
    
    <a href="Site-Home.html"><button class="button-back">voltar</button></a>

    <div id="div"></div>

    <div id="login">
    <form class="card" action="adiciona-imagem.php" method="POST" enctype="multipart/form-data">
    <div class="card-header">
        <h2>Login</h2>
    </div>

    <div class="card-content">
        <div class="card-content-area">
            <label for="email">Email Obrigatório</label>
            <input type="text" id="email" name="email" autocomplete="off" required>
        </div>

        <div class="card-content-area">
        <label for="imagem">Enviar imagem:</label>
        <input type="file" id="imagem" name="imagem">
        <br>
        <div class="card-footer">
        <input type="submit" value="Enviar" class="submit">
        <a href="#" class="recuperar_senha">Esqueceu a senha?</a>
        </div>
        </div>
    </div>

</form>
    </div>