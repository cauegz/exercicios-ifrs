package animais.entities;

public class Rica extends Pessoa{
    private Double dinheiro;

    public Rica(Double dinheiro, String nome, Integer idade) {
        super();
        super.setIdade(idade);
        super.setNome(nome);
        this.dinheiro = dinheiro;
    }

    public Double getDinheiro() {
        return dinheiro;
    }

    public void setDinheiro(Double dinheiro) {
        this.dinheiro = dinheiro;
    }

    public String fazCompras(){
        return super.getNome() + " rico está fazendo compras";
    }

    @Override
    public String toString() {
        return "Rica{" +
                super.toString() +
                "dinheiro=" + dinheiro +
                '}';
    }
}
