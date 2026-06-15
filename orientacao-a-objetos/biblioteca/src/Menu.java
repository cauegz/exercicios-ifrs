package biblioteca.src;

import biblioteca.entities.Emprestimo;
import biblioteca.entities.Livro;
import biblioteca.entities.Pessoa;

import java.util.ArrayList;
import java.util.stream.Collectors;
import java.util.stream.IntStream;

public class Menu {
    private ArrayList<Livro> listaLivro = new ArrayList<Livro>();
    private ArrayList<Pessoa> listaPessoa = new ArrayList<Pessoa>();
    private ArrayList<Emprestimo> listaEmprestimo = new ArrayList<Emprestimo>();

    public String exibeMenuPadrao(){
        return """
                ----- Bem vindo ao sistema de gerenciamento de biblioteca -----\s
                Digite a opção correspondente ao item do menu.\s
                1 - Registrar um novo empréstimo\s
                2 - Registrar um novo livro\s
                3 - Registrar um novo usuário\s
                4 - Consultar os empréstimos atuais\s
                5 - Fechar o sistema\s
                Resposta:
               """;
    }

    public ArrayList<Livro> getListaLivro() {
        return listaLivro;
    }

    public ArrayList<Pessoa> getListaPessoa() {
        return listaPessoa;
    }

    public String exibeListaLivro() {
        return IntStream.range(0, listaLivro.size())
                .mapToObj(i -> {
                    Livro l = listaLivro.get(i);
                    return "[" + i + "] -> Título: " + l.getTitulo()
                            + " | Autor: " + l.getAutor()
                            + " | Gênero: " + l.getGenero()
                            + " | Ano de lançamento: " + l.getAnoLancamento();
                })
                .collect(Collectors.joining("\n"));
    }

    public String exibeListaPessoa() {
        return IntStream.range(0, listaPessoa.size())
                .mapToObj(i -> {
                    Pessoa p = listaPessoa.get(i);
                    return "[" + i + "] -> Nome: " + p.getNome();
                })
                .collect(Collectors.joining("\n"));
    }

    public ArrayList<Emprestimo> getListaEmprestimo() {
        return listaEmprestimo;
    }

    public void registraEmprestimo(Emprestimo emprestimo){
        this.listaEmprestimo.add(emprestimo);
    }

    public void registraLivro(Livro livro){
        this.listaLivro.add(livro);
    }

    public void registraPessoa(Pessoa pessoa){
        this.listaPessoa.add(pessoa);
    }
}
