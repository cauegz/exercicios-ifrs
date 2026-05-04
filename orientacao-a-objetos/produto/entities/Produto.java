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
        if(nome.length() < 2){
            this.nome = "xx";
            return;
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
        if(nome.length() < 2){
            this.nome = "xx";
            return this;
        }
        this.nome = nome;
        return this;
    }

    public int getPorcDesconto() {
        return porcDesconto;
    }

    public int getParcelas() {
        return parcelas;
    }

    public Produto setParcelas(int parcelas){
        if(parcelas < MAX_PARCELAS){
            this.parcelas = parcelas;
        }
        return this;
    }

    public Produto setDesconto(int porcDesconto){
        if(porcDesconto > MAX_DESCONTO || porcDesconto == 0){
            return this;
        }
        this.porcDesconto = porcDesconto;
        return this;
    }

    @Override
    public String toString() {
        return "Produto{" +
                "valor=" + valor +
                ", nome='" + nome + '\'' +
                ", porcDesconto=" + porcDesconto +
                ", parcelas=" + parcelas +
                '}';
    }
}
