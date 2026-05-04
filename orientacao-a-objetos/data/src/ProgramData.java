package data.src;

import data.entities.Data;

import java.util.Locale;
import java.util.Objects;
import java.util.Scanner;

public class ProgramData {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        Locale.setDefault(Locale.US);

        System.out.println("Dia: ");
        int dia = sc.nextInt();
        System.out.println("Mes: ");
        int mes = sc.nextInt();
        System.out.println("Ano: ");
        int ano = sc.nextInt();

        Data data = new Data(dia, mes, ano);
        if(!Objects.equals(data.getMensagemErro(), "")){
            System.out.println(data.getMensagemErro());
        }
        System.out.println(data.verData());
        sc.close();
    }
}
