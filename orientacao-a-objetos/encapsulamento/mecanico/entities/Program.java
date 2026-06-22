package encapsulamento.mecanico.entities;

import encapsulamento.mecanico.src.Concertos;
import encapsulamento.mecanico.src.Proprietario;
import encapsulamento.mecanico.src.Veiculo;

import java.time.LocalDate;

public class Program {
    public static void main(String[] args) {

        // Criando proprietário
        Proprietario proprietario = new Proprietario();
        proprietario.setNome("João Silva");
        proprietario.setTelefone("(41) 99999-9999");

        // Criando veículo
        Veiculo veiculo = new Veiculo();
        veiculo.setMarca("Volkswagen");
        veiculo.setModelo("Gol");
        veiculo.setCor("Prata");
        veiculo.setPlaca("ABC-1234");

        // Criando conserto
        Concertos concerto = new Concertos();
        concerto.setProprietario(proprietario);
        concerto.setVeiculo(veiculo);
        concerto.setDataInicio(LocalDate.now());
        concerto.setPrevisaoEntrega(LocalDate.now().plusDays(5));

        // Exibindo dados 
        System.out.println("=== CONCERTO ===");
        System.out.println("Proprietário: " + concerto.getProprietario().getNome());
        System.out.println("Telefone: " + concerto.getProprietario().getTelefone());

        System.out.println("\n=== VEÍCULO ===");
        System.out.println("Marca: " + concerto.getVeiculo().getMarca());
        System.out.println("Modelo: " + concerto.getVeiculo().getModelo());
        System.out.println("Cor: " + concerto.getVeiculo().getCor());
        System.out.println("Placa: " + concerto.getVeiculo().getPlaca());

        System.out.println("\n=== DATAS ===");
        System.out.println("Data início: " + concerto.getDataInicio());
        System.out.println("Previsão entrega: " + concerto.getPrevisaoEntrega());
    }
}