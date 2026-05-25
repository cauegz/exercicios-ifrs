package ingresso.entities;

public class VIP extends Ingresso{
    private double valorTotal;
    public VIP(double valor, double valorAdicional) {
        double valorTotal = valor + valorAdicional;
        super(valorTotal);
        this.valorTotal = valorTotal;
    }

    public double getValorTotal() {
        return valorTotal;
    }

    public void setValorTotal(double valorTotal) {
        this.valorTotal = valorTotal;
    }

    public double getValorAdicional(){
        return valorTotal - super.getValor();
    }

    @Override
    public String imprimeValor(){
        return "Valor do ingresso VIP: " + this.valorTotal;
    }
}
