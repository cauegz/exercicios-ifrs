package animais.entities;

public class Cachorro extends Animal{
    public Cachorro() {
    }

    public Cachorro(String nome, String raca) {
        super(nome, raca);
    }

    public String late(){
        return super.getNome() + " está latindo";
    }

    @Override
    public String toString() {
        return "Cachorro{" + super.toString() + "\n}";
    }
}
