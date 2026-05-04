<?php
    session_start();
    require_once "conexao.php";
    include "funcoes_log.php";
    if(isset($_SESSION['msg_erro'])){
        echo '<p style="color: red">' . $_SESSION['msg_erro'] . '</p>';
        $_SESSION['msg_erro'] = NULL;
    }


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $usuario = $_POST['usuario'];
        $senha_login = $_POST['senha'];

        if(!isset($usuario) || !isset($senha_login)) die("Usuario ou senha nulos.");

        $sql = "SELECT * FROM usuario WHERE nome = :usuario";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":usuario", $usuario);
        $stmt->execute();

        $usuario_banco = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$usuario_banco){
            $_SESSION['msg_erro'] = "senha ou usuario errados!";

            header("Location: login.php");
        }

        $senha_banco = $usuario_banco['senha'];

        if(password_verify($senha_login, $senha_banco)){
            $_SESSION['id_usuario'] = $usuario_banco['id_usuario'];
            $_SESSION['nome_usuario'] = $usuario_banco['nome'];

            escreveLogs($_SESSION['nome_usuario'] . " fez login", "login");

            if(isset($_POST['lembrar'])){
            $validator = bin2hex(random_bytes(32));
            $selector = bin2hex(random_bytes(32));

            $validator_hash = password_hash($validator, PASSWORD_DEFAULT);
            $expires_at = date('Y-m-d H:i:s', strtotime('+30 days'));

            setcookie(
                name: "lembrar",
                value: "$selector:$validator",
                expires_or_options: time() + (60 * 60 * 24 * 30),
                domain: "localhost",
                path: "/",
                secure: false,
                httponly: true
            );

            $sql = "INSERT INTO remember_tokens (id_usuario, validator_hash, selector, expires_at) VALUES
                (:id_usuario, :validator_hash, :selector, :expires_at)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":id_usuario", $usuario_banco['id_usuario']);
            $stmt->bindParam(":validator_hash", $validator_hash);
            $stmt->bindParam(":selector", $selector);
            $stmt->bindParam(":expires_at", $expires_at);

            $stmt->execute();
        }

            header("Location: index.php");
            exit;
        } else {
            $_SESSION['msg_erro'] = "senha ou usuario errados!";

            header("Location: login.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="input-usuario">Usuario: </label> <input type="text" name="usuario" id="input-usuario">
        <label for="input-senha">Senha: </label> <input type="password" name="senha" id="input-senha"> <br>
        <label for="input-lembrar">Lembrar de mim? </label> <input type="checkbox" name="lembrar" id="input-lembrar">

        <p>Ainda não possui uma conta? <a href="cadastro.php">Criar</a></p>
        <br> <button type="submit">Enviar</button>
    </form>
</body>
</html>