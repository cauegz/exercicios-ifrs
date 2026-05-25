package ingresso.entities;

public class CamaroteInferior extends VIP{
    private String localizacao;
    public CamaroteInferior(double valor, double valorAdicional, String localizacao) {
        super(valor, valorAdicional);
        this.localizacao = localizacao;
    }

    public String getLocalizacao() {
        return localizacao;
    }

    public void setLocalizacao(String localizacao) {
        this.localizacao = localizacao;
    }

    @Override
    public String imprimeValor(){
        return "Valor do ingresso VIP camarote inferior: " + getValor();
    }
}
