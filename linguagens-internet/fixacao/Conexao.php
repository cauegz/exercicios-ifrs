<?php
class Conexao {
    private static $pdo;

    public static function getConnection(){
        if(self::$pdo == null){
            $dsn = 'mysql:host=localhost;dbname=loja;charset=utf8';
            $usuario = "root";
            $senha = "";

            try {
                self::$pdo = new PDO(
                    $dsn,
                    $usuario,
                    $senha
                );

                self::$pdo->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            } catch (PDOException $e) {
                die("Erro de conexão com o banco: " . $e);
            }
        }
        return self::$pdo;
    }
}