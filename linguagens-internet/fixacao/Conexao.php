<?php
//carrega o env
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
class Conexao {
    private static $pdo;

    public static function getConnection(){
        if(self::$pdo == null){
            $dbname = $_ENV['MYSQL_DBNAME'];
            $usuario = $_ENV['MYSQL_USER'];
            $senha = $_ENV['MYSQL_PASS'];
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