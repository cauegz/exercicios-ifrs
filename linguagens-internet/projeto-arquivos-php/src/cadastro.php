<?php
    require_once "conexao.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $usuario = $_POST['usuario'];

        //criptografa a senha logo ao pegar ela do post
        $senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        if(!isset($usuario) || !isset($senha_hash)) die("Usuario ou senha nulos.");

        $sql = "INSERT INTO usuario (nome, senha) VALUES (:usuario, :senha_hash)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":senha_hash", $senha_hash);

        if($stmt->execute()){
            $_SESSION['msg_erro'] = "usuario cadastrado com sucesso";
            header("Location: login.php");
            exit;
        } else {
            echo "erro ao cadastrar o usuario";
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro</h1>
    <form action="cadastro.php" method="post">
        <label for="input-usuario-cadastro">Usuario: </label> <input type="text" name="usuario" id="input-usuario-cadastro">
        <label for="input-senha-cadastro">Senha: </label> <input type="password" name="senha" id="input-senha-cadastro"> <br>

        <p>Já possui uma conta? <a href="login.php">Login</a></p>
        <br> <button type="submit">Enviar</button>
    </form>
</body>
</html>