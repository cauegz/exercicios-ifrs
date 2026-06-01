package Biblioteca.entities;

public class Livro {
    private String titulo;
    private String autor;
    private String genero;
    private int anoLancamento;

    public Livro(String titulo, String autor, String genero, int anoLancamento) {
        this.titulo = titulo;
        this.autor = autor;
        this.genero = genero;
        this.anoLancamento = anoLancamento;
    }

    public Livro() {
    }

    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public String getGenero() {
        return genero;
    }

    public void setGenero(String genero) {
        this.genero = genero;
    }

    public int getAnoLancamento() {
        return anoLancamento;
    }

    public void setAnoLancamento(int anoLancamento) {
        this.anoLancamento = anoLancamento;
    }
}
