<?php 
require 'config.php';

$usuario = [];
$id = filter_input(INPUT_GET,'id');

if($id){
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0){
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("location: Site-Home.html");
        exit;
    }
}else{
    header("location: Site-Home.html");
}

?>

<h1>Editar Usuário</h1>
<form method= "POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$usuario['id'];?>>

        <label for="">
        Nome: <input type="text" name="nome" value="<?=$usuario['nome'];?>">
        </label>
        <label for="">
        Senha: <input type="text" name="senha" value="<?=$usuario['senha'];?>">
        </label>

        <label for="">
        Telefone: <input type="text" name="telefone" value="<?=$usuario['telefone'];?>">
        </label>

        <label for="">
        email: <input type="text" name="email" value="<?=$usuario['email'];?>">
        </label>
        <input type="submit" value="atualizar">
        
</form>
