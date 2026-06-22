<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../Conexao.php";
if(isset($_POST)){
    try {
        $pdo = Conexao::getConnection();
        
        $tabela = $_POST['tabela'];

        $allowedTables = ['usuario', 'produto', 'funcionario', 'avaliacao'];
        if (!in_array($tabela, $allowedTables)) {
            die("tabela inválida");
        }

        unset($_POST['tabela']);
        $dados = $_POST;

        $valoresArray = array_values($dados);
        $colunas = implode(",", array_keys($dados));

        $colunasBind = str_replace(",", ",:", $colunas);

        $sql = "INSERT INTO $tabela ($colunas) VALUES (:$colunasBind)";

        $stmt = $pdo->prepare($sql);

        $colunasBind = ":" . $colunasBind;
        $arrayColunas = explode(",", $colunasBind);

        for ($i=0; $i < sizeof($arrayColunas); $i++) { 
            $stmt->bindValue($arrayColunas[$i], $valoresArray[$i]);
        }

        $stmt->execute();

        echo "dados inseridos com sucesso, último id: " . $pdo->lastInsertId();
    } catch (Exception $th) {
        echo "deu ruim ai, exceção: $th";
    }
}