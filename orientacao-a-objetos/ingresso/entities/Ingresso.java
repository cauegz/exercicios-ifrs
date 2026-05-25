package ingresso.entities;

public class Ingresso {
    private double valor;

    public Ingresso(double valor) {
        this.valor = valor;
    }

    public double getValor() {
        return valor;
    }

    public void setValor(double valor) {
        this.valor = valor;
    }

    public String imprimeValor(){
        return "O valor do ingresso é: " + this.valor;
    }
}
