package Biblioteca.src;

import Biblioteca.entities.Emprestimo;
import Biblioteca.entities.Livro;
import Biblioteca.entities.Pessoa;

import java.time.LocalDate;

public class Program {
    static void main(String[] args) {
        Pessoa pessoa = new Pessoa();
        Livro livro = new Livro();
        Emprestimo emprestimo = new Emprestimo();
        Menu menu = new Menu();
        System.out.println(menu.exibeMenu());

    }
}
