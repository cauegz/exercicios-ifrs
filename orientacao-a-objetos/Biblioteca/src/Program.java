package Biblioteca.src;

import Biblioteca.entities.Emprestimo;
import Biblioteca.entities.Livro;
import Biblioteca.entities.Pessoa;

import java.time.LocalDate;
import java.util.Scanner;

public class Program {
    static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        Pessoa pessoa = new Pessoa();
        Livro livro = new Livro();
        Emprestimo emprestimo = new Emprestimo();
        Menu menu = new Menu();
        System.out.println(menu.exibeMenuPadrao());
        int resposta = sc.nextInt();
        switch (resposta){
            case 1:
                System.out.println("Insira ");
        }
    }
}
