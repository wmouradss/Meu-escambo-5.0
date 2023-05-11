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

    <div id="div"></div>

    <div id="logomarca">
        <img src="img/logo.png" alt="logo">
    </div>

    <div class="container_form">
        <h1>Formulário de Cadastro</h1>
        <form class="form" action="cadastrar_action.php" method="post" id="form">
            
            <div class="form_grupo">
                <label for="nome" class="form_label">Nome</label>
                <input type="text" name="nome" class="form_input" id="nome" placeholder="digite seu nome completo" required oninput="nameValidate()"  pattern="^[^-\s][a-zA-ZÀ-ú ]*">

            </div>
            
            <div class="form_grupo">
                <label for="senha" class="form_label">Senha</label>
                <input type="password" name="senha" class="form_input" id="senha" placeholder="digite sua senha" minlength="4"  required >
                <span></span>
            </div>

            <div class="form_grupo">
                <label for="confirmarsenha" class="form_label">Confirmar senha</label>
                <input type="password" name="confirmarsenha" class="form_input" id="confirmarsenha" placeholder="confirme sua senha"  required>
            </div>
            
            <div class="form_grupo">
                <label for="telefone" class="form_label">Telefone</label>
                <input type="text" name="telefone" class="form_input" id="telefone" placeholder="DDD + número de telefone" required>
            </div>

            <div class="form_grupo">
                <label for="e-mail" class="form_label">E-mail</label>
                <input type="email" name="email" class="form_input" id="email" placeholder="digite seu e-mail" oninput="emailValidate()" required>
            </div>
                        

                
                <div class="submit">
                  <input type="hidden" name="acao" value="cadastrar">
                  <button type="submit" name="Submit" class="submit_btn">Cadastrar</button>
                </div>
        </form>
</div>
<script>
    const form = document.getElementById('form');
    const campos = document.querySelectorAll('.form_input');
    const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;

    function setError(index, mensagem) {
        campos[index].style.border = '2px solid #e63636';
        const span = campos[index].parentNode.querySelector('span');
        span.innerHTML = mensagem;
        span.style.display = 'block';
    }

    function removeError(index) {
        campos[index].style.border = '';
        const span = campos[index].parentNode.querySelector('span');
        span.innerHTML = '';
        span.style.display = 'none';
    }

    function validateForm(event) {
        let formValid = true;
        const senha = campos[1].value;
        const confirmarSenha = campos[2].value;
        const telefone = campos[3].value;
        
        // Verifica se os campos de senha e confirmar senha são iguais
        if (senha !== confirmarSenha) {
            setError(1, 'As senhas não coincidem.');
            setError(2, 'As senhas não coincidem.');
            formValid = false;
        } else {
            removeError(1);
            removeError(2);
        }
        
        // Verifica se o campo de telefone está preenchido corretamente
        if (!/^\d{2}\s?\d{8,9}$/.test(telefone)) {
            setError(3, 'Telefone inválido. Digite apenas números, com DDD e sem hífen.');
            formValid = false;
        } else {
            removeError(3);
        }
        
        // Verifica se os campos obrigatórios foram preenchidos
        for (let i = 0; i < campos.length; i++) {
            if (campos[i].hasAttribute('required') && !campos[i].value) {
                setError(i, 'Este campo é obrigatório.');
                formValid = false;
            }
        }
        
        if (!formValid) {
            event.preventDefault();
        }
    }

    function nameValidate() {
        if (campos[0].value.length < 3) {
            setError(0, 'Nome inválido. Deve conter no mínimo 3 caracteres.');
        } else {
            removeError(0);
        }
    }

    function emailValidate() {
        if (!emailRegex.test(campos[4].value)) {
            setError(4, 'E-mail inválido.');
        } else {
            removeError(4);
        }
    }

    form.addEventListener('submit', validateForm);
</script>


</body>
</html>