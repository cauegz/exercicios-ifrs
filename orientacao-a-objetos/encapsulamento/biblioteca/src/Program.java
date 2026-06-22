package encapsulamento.biblioteca.src;

import encapsulamento.biblioteca.entities.Emprestimo;
import encapsulamento.biblioteca.entities.Livro;
import encapsulamento.biblioteca.entities.Pessoa;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.Scanner;

public class Program {
    static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        Menu menu = new Menu();
        boolean sair = false;

        while (!sair) {

            System.out.println(menu.exibeMenuPadrao());
            int resposta = sc.nextInt();

            sc.nextLine();
            switch (resposta) {
                case 1:
                    System.out.println("Selecione um dos livros: \n");
                    System.out.println(menu.exibeListaLivro());
                    int rLivro = sc.nextInt();
                    System.out.println("Selecione um dos usuários: \n");
                    System.out.println(menu.exibeListaPessoa());
                    int rPessoa = sc.nextInt();
                    sc.nextLine();
                    System.out.println("Data de empréstimo (dd/mm/yy): ");
                    LocalDate dataEmp = LocalDate.parse(sc.nextLine(), DateTimeFormatter.ofPattern("dd/MM/yy"));
                    System.out.println("Data de devolução (dd/mm/yy): ");
                    LocalDate dataDev = LocalDate.parse(sc.nextLine(), DateTimeFormatter.ofPattern("dd/MM/yy"));
                    menu.registraEmprestimo(new Emprestimo(menu.getListaLivro().get(rLivro), menu.getListaPessoa().get(rPessoa), dataEmp, dataDev));
                    break;
                case 2:
                    System.out.println("Título: ");
                    String titulo = sc.nextLine();
                    System.out.println("Autor: ");
                    String autor = sc.nextLine();
                    System.out.println("Gênero: ");
                    String genero = sc.nextLine();
                    System.out.println("Ano de lançamento: ");
                    int ano = sc.nextInt();
                    menu.registraLivro(new Livro(titulo, autor, genero, ano));
                    break;
                case 3:
                    System.out.println("Nome: ");
                    String nome = sc.nextLine();
                    System.out.println("Email: ");
                    String email = sc.nextLine();
                    System.out.println("Data de nascimento (dd/mm/yy): ");
                    LocalDate nascimento = LocalDate.parse(sc.nextLine(), DateTimeFormatter.ofPattern("dd/MM/yy"));
                    menu.registraPessoa(new Pessoa(nome, email, nascimento));
                    break;
                case 4:
                    System.out.println(menu.getListaEmprestimo());
                    break;
                case 5:
                    sair = true;
                    break;
                default:
                    System.out.println("opção incorreta\n");
            }
        }
    }
}
