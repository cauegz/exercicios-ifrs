<?php
require "../Conexao.php";
if(isset($_POST)){
    try {
        $pdo = Conexao::getConnection();
        //nao ta funcionando gambiarra do caralho
        $colunas = "";
        foreach($_POST as $coluna){
            $colunas .= array_search($coluna, $_POST) . ",";
        }
        $colunas = substr($colunas, 0, -1);
        
        foreach($_POST as $coluna){
            $sql = "INSERT INTO usuario ($colunas) VALUES (:$coluna)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ":$coluna" => $coluna
            ]);
        }
        
        
        echo "dados inseridos com sucesso, último id: " . $pdo->lastInsertId();
    } catch (Exception $th) {
        echo "deu ruim ai, exceção: $th";
    }
}
