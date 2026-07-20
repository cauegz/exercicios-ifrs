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
        if (!in_array($tabela, $allowedTables)) die("tabela inválida");

        $id = $_POST['id'];
        unset($_POST['id']);
        if(!is_numeric($id)) die("vocẽ é um usuário do mal");

        unset($_POST['tabela']);
        
        $dados = $_POST;

        $valoresArray = array_values($dados);
        $colunas = implode(",", array_keys($dados));

        $colunasBind = str_replace(",", ",:", $colunas);
        
        $colunasBind = ":" . $colunasBind;
        $arrayColunas = explode(",", $colunasBind);

        $sql = "UPDATE $tabela SET";

        foreach ($arrayColunas as $coluna) {
            $colunaTabela = str_replace(":", "", $coluna);
            $sql .= " $colunaTabela = $coluna,";
        }
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE id_$tabela = :id";
        $stmt = $pdo->prepare($sql);

        for ($i=0; $i < sizeof($arrayColunas); $i++) { 
            $stmt->bindValue($arrayColunas[$i], $valoresArray[$i]);
        }
        $stmt->bindValue(":id", $id);

        $stmt->execute();

        // echo "dados inseridos com sucesso, último id: " . $pdo->lastInsertId();
        header("Location: ../forms/form" . ucfirst($tabela) . ".php");
    } catch (Exception $th) {
        echo "deu ruim ai, exceção: $th";
    }
}