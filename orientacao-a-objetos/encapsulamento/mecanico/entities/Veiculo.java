package encapsulamento.mecanico.entities;

public class Veiculo {
    private String cor;
    private String marca;
    private String modelo;
    private String placa;

    public Veiculo(String cor, String marca, String modelo, String placa) {
        this.cor = cor;
        this.marca = marca;
        this.modelo = modelo;
        this.placa = placa;
    }

    public Veiculo() {
    }

    public String getCor() {
        return cor;
    }

    public void setCor(String cor) {
        this.cor = cor;
    }

    public String getMarca() {
        return marca;
    }

    public void setMarca(String marca) {
        this.marca = marca;
    }

    public String getModelo() {
        return modelo;
    }

    public void setModelo(String modelo) {
        this.modelo = modelo;
    }

    public String getPlaca() {
        return placa;
    }

    public void setPlaca(String placa) {
        this.placa = placa;
    }
}
