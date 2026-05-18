package animais.entities;

public class Gato extends Animal{
    public Gato() {
    }

    public Gato(String nome, String raca) {
        super(nome, raca);
    }

    public String mia(){
        return super.getNome() + " está miando";
    }

    @Override
    public String toString() {
        return "Gato{" + super.toString() + "\n}";
    }
}
