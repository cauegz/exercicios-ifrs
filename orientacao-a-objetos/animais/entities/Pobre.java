package animais.entities;

public class Pobre extends Pessoa{
    public Pobre(String nome, Integer idade) {
        super.setNome(nome);
        super.setIdade(idade);
    }

    public String trabalha(){
        return super.getNome() + " pobre está trabalhando";
    }

    @Override
    public String toString() {
        return "Pobre: " + super.toString();
    }
}
