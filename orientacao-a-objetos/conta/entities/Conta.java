package conta.entities;

public class Conta {
    private double saldo;
    private String numeroConta;
    private String titularConta;

    public Conta(double saldo, String numeroConta, String titularConta) {
        this.saldo = Math.max(saldo, 0.0);
        this.numeroConta = numeroConta;
        this.titularConta = titularConta;
    }

    public Conta(String numeroConta, String titularConta) {
        this.saldo = 0;
        this.numeroConta = numeroConta;
        this.titularConta = titularConta;
    }

    public double getSaldo() {
        return saldo;
    }

    public String getNumeroConta() {
        return numeroConta;
    }

    public void setNumeroConta(String numeroConta) {
        this.numeroConta = numeroConta;
    }

    public String getTitularConta() {
        return titularConta;
    }

    public void setTitularConta(String titularConta) {
        this.titularConta = titularConta;
    }

    public void sacar(double valor){
        this.saldo -= valor;
    }

    public void depositar(double valor){
        this.saldo += valor;
    }

    @Override
    public String toString() {
        return "Conta{" +
                "saldo=" + saldo +
                ", numeroConta='" + numeroConta + '\'' +
                ", titularConta='" + titularConta + '\'' +
                '}';
    }
}
