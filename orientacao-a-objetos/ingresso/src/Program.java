package ingresso.src;

import ingresso.entities.CamaroteInferior;
import ingresso.entities.CamaroteSuperior;
import ingresso.entities.Ingresso;
import ingresso.entities.VIP;

public class Program {
    static void main(String[] args) {
        Ingresso ingresso = new Ingresso(100);
        VIP ingressoVIP = new VIP(ingresso.getValor(), 20);
        CamaroteInferior camaroteInferior = new CamaroteInferior(ingresso.getValor(), 20, "C5");
        CamaroteSuperior camaroteSuperior = new CamaroteSuperior(ingressoVIP.getValor(), 20, 10);

        System.out.println(ingresso.imprimeValor());
        System.out.println(ingressoVIP.imprimeValor());
        System.out.println(camaroteInferior.imprimeValor());
        System.out.println(camaroteSuperior.imprimeValor());
    }
}
