package ingresso.entities;

public class CamaroteSuperior extends VIP{
    private double valorAdicionalSuperior;
    private double valorTotal;

    public CamaroteSuperior(double valor, double valorAdicional, double valorAdicionalSuperior) {
        super(valor, valorAdicional);
        this.valorAdicionalSuperior = valorAdicionalSuperior;
        this.valorTotal = valor + valorAdicional + valorAdicionalSuperior;
    }

    public double getValorAdicionalSuperior() {
        return valorAdicionalSuperior;
    }

    public void setValorAdicionalSuperior(double valorAdicionalSuperior) {
        this.valorAdicionalSuperior = valorAdicionalSuperior;
    }

    @Override
    public double getValorTotal() {
        return valorTotal;
    }

    @Override
    public String imprimeValor(){
        return "Valor do ingresso VIP camarote superior: " + getValor();
    }
}
