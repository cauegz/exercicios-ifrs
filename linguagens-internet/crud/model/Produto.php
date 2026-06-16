<?php
class Produto {
    private ?int $id;
    private string $nome;
    private string $descricao;
    private float $preco;

    public function __construct(string $nome, string $descricao, float $preco)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    public function salvarBanco(){
        
    }
}