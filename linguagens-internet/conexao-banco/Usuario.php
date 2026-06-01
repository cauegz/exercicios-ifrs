<?php
class Usuario{
    private string $nome;
    private string $senha;


    public function __construct(string $nome, string $senha)
    {
        $this->nome = $nome;
        $this->senha = $senha;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome(string $senha){
        $this->senha = $senha;
    }
    public function getSenha(){
        return $this->nome;
    }
    public function setSenha(string $senha){
        $this->senha = $senha;
    }

}