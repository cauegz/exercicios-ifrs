package encapsulamento.agenda.src;

import encapsulamento.agenda.entities.Agenda;
import encapsulamento.agenda.entities.Contato;

import java.util.Locale;
import java.util.Scanner;

public class Program {
    static void main(String[] args) {
        Locale.setDefault(Locale.US);
        Scanner sc = new Scanner(System.in);
        boolean fechar = false;
        Agenda agenda = new Agenda("minha agenda");

        while (!fechar){
            System.out.print("1 - Adicionar um novo contato. \n2 - Visualizar a agenda de contatos. \n3 - Fechar sistema \nResposta: ");
            int resposta = sc.nextInt();
            sc.nextLine();
            switch (resposta){
                case 1:
                    System.out.print("Nome do contato: ");
                    String nome = sc.nextLine();
                    System.out.print("Telefone do contato: ");
                    String telefone = sc.nextLine();
                    System.out.print("Email do contato: ");
                    String email = sc.nextLine();
                    agenda.addContato(new Contato(nome, telefone, email));
                    break;
                case 2:
                    System.out.println("\n" + agenda);
                    break;
                case 3:
                    fechar = true;
                    break;
            }
        }
    }
}
