<?php
require "../Conexao.php";
if(isset($_POST)){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    try {
        $sql = "INSERT INTO usuario (nome, email, cpf, senha) VALUES (:nome, :email, :cpf, :senha)";
        $pdo = Conexao::getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":nome" => $nome,
            ":email" => $email,
            ":cpf" => $cpf,
            ":senha" => $senha
        ]);
        echo "dados inseridos com sucesso, último id: " . $pdo->lastInsertId();
    } catch (Exception $th) {
        echo "deu ruim ai, exceção: $th";
    }
}
