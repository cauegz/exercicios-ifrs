package encapsulamento.mecanico.src;

import java.time.LocalDate;

public class Concertos {
    private Proprietario proprietario;
    private Veiculo veiculo;
    private LocalDate dataInicio;
    private LocalDate previsaoEntrega;

    public Concertos(Proprietario proprietario, Veiculo veiculo, LocalDate dataInicio, LocalDate previsaoEntrega) {
        this.proprietario = proprietario;
        this.veiculo = veiculo;
        this.dataInicio = dataInicio;
        this.previsaoEntrega = previsaoEntrega;
    }

    public Concertos() {
    }

    public Proprietario getProprietario() {
        return proprietario;
    }

    public void setProprietario(Proprietario proprietario) {
        this.proprietario = proprietario;
    }

    public Veiculo getVeiculo() {
        return veiculo;
    }

    public void setVeiculo(Veiculo veiculo) {
        this.veiculo = veiculo;
    }

    public LocalDate getDataInicio() {
        return dataInicio;
    }

    public void setDataInicio(LocalDate dataInicio) {
        this.dataInicio = dataInicio;
    }

    public LocalDate getPrevisaoEntrega() {
        return previsaoEntrega;
    }

    public void setPrevisaoEntrega(LocalDate previsaoEntrega) {
        this.previsaoEntrega = previsaoEntrega;
    }
}
