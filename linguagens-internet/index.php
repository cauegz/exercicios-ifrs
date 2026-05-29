<?php
require_once "Conexao.php";
require_once "Usuario.php";
require_once "UsuarioDAO.php";

if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $conn = new Conexao;
    $pdo = $conn->getConnection();

    $usuario = new Usuario($nome, $senha);
    $dao = new UsuarioDAO($pdo);

    if($dao->save($usuario)){
        echo "salvoou";
    } else {
        echo "deu ruim ai";
    }
}

// codigo conexao com o banco
    // $nome = "mouse";
    // $preco = 175.00;
    // $descricao = "mouse gamer 16000 DPI";

    // $sql = "INSERT INTO produtos (nome, preco, descricao) VALUES (:nome, :preco, :descricao)";
    // $pdo = new Conexao;
    // $pdo = $pdo::getConnection();
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindParam(":nome", $nome); 
    // $stmt->bindParam(":preco", $preco); 
    // $stmt->bindParam(":descricao", $descricao); 
    // $stmt->execute();
    // echo "Último ID inserido: " . $pdo->lastInsertId();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="input_usuario">
            Nome: 
            <input type="text" name="nome" id="input_usuario">
        </label>
        <label for="input_senha">
            Senha: 
            <input type="password" name="senha" id="input_senha">
        </label>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>