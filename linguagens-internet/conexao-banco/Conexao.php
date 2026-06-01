<?php
class Conexao
{
    public static function getConnection()
    {
        $dsn = "mysql:host=localhost;dbname=loja;charset=utf8";
        $usuario = "root";
        $senha = "";

        try {
            $pdo = new PDO($dsn, $usuario, $senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $th) {
            echo "Erro na conexão: " . $th->getMessage();
        }
    }
}
