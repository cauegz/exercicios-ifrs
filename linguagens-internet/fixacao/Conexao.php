<?php
class Conexao {
    private static $pdo;

    public static function getConnection(){
        if(self::$pdo == null){
            $dbname = getenv('MYSQL_DBNAME');
            $usuario = getenv('MYSQL_USER');
            $senha = getenv('MYSQL_PASS');
            $dsn = "mysql:host=localhost;dbname=$dbname;charset=utf8";

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