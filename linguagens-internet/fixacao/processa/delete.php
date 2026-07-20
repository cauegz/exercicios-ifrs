<?php
require_once "../Conexao.php";
$mapa = [
    "1" => "produto",
    "2" => "funcionario",
    "3" => "avaliacao",
    "4" => "usuario",
    "5" => "venda"
];
$tabela = $mapa[$_POST["tipo"]];
$id = $_POST["id"];

if(!(is_numeric($id))) die("você é um usuário do mal");

try {
    $sql = "DELETE FROM $tabela WHERE id_$tabela = :id";
    $pdo = Conexao::getConnection();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id" => $id]);
} catch (PDOException $th) {
    die("deu problema: " . $th);
}
header("Location: /forms/form" . ucfirst($tabela) . ".php");