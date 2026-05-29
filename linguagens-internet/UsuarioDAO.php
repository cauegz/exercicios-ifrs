<?php
class UsuarioDAO{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function setPDO(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function save(Usuario $usuario){
        if(!($usuario instanceof Usuario)){
            return false;
        }
        $pdo = $this->pdo;

        $nome = $usuario->getNome();
        $senha = $usuario->getSenha();

        $sql = "INSERT INTO usuario (nome, senha) VALUES (:nome, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":senha", $senha);
        if($stmt->execute()){
            return true;
        }
        return false;
        
    }
}