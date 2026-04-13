package produto.entities;

public class Produto {
    //constantes
    public static final int MAX_DESCONTO = 20;
    public static final int MAX_PARCELAS = 24;

    //atributos
    double valor;
    String nome;
    int porcDesconto = MAX_DESCONTO;
    int parcelas = MAX_PARCELAS;

    public Produto(double valor, String nome) {
        this.valor = Math.max(valor, 0.01);
        if(nome.length() > 2){
            this.nome = nome;
        } else {
            this.nome = "xx";
        }
        this.nome = nome;
    }

    public Produto() {
    }

    public double getValor() {
        return valor;
    }

    public Produto setValor(double valor) {
        this.valor = valor;
        return this;
    }

    public String getNome() {
        return nome;
    }

    public Produto setNome(String nome) {
        this.nome = nome;
        return this;
    }

    public int getPorcDesconto() {
        return porcDesconto;
    }

    public int getParcelas() {
        return parcelas;
    }

    public void mudaParcelas(int parcelas){
        if(parcelas < MAX_PARCELAS){
            this.parcelas = parcelas;
        }
    }

    public void mudaDesconto(int porcDesconto){
        if(porcDesconto < MAX_DESCONTO){
            this.porcDesconto = porcDesconto;
        }
    }
}
