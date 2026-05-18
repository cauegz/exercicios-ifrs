package animais.entities;

public class Miseravel extends Pessoa{
    public Miseravel(String nome, Integer idade) {
        this.setIdade(idade);
        this.setNome(nome);
    }

    public String mendiga(){
        return super.getNome() + " miserável está mendigando";
    }

    public String toString() {
        return "Miserável{" +
                    super.toString() +
                '}';
    }
}
