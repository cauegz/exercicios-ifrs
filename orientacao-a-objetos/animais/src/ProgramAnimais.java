package animais.src;

import animais.entities.*;

public class ProgramAnimais {
    static void main(String[] args) {
        Cachorro cachorro = new Cachorro("Tobi", "yorkshire");
        Gato gato = new Gato("rex", "persa");

        Rica rica = new Rica(1000.00, "roberta", 60);
        Pobre pobre = new Pobre("marcino", 90);
        Miseravel miseravel = new Miseravel("fabricio", 10);

        System.out.println(cachorro);
        System.out.println(gato);
        System.out.println(rica);
        System.out.println(pobre);
        System.out.println(miseravel);

        System.out.println(pobre.trabalha());
        System.out.println(miseravel.mendiga());
        System.out.println(rica.fazCompras());
    }
}
