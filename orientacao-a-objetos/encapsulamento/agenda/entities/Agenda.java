package encapsulamento.agenda.entities;

import java.util.ArrayList;

public class Agenda {
    private String nome;
    private ArrayList<Contato> contatos = new ArrayList<Contato>();

    public Agenda(String nome, ArrayList<Contato> contatos) {
        this.nome = nome;
        this.contatos = contatos;
    }

    public Agenda(String nome) {
        this.nome = nome;
    }

    public Agenda() {
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public ArrayList<Contato> getContatos() {
        return contatos;
    }

    public void addContato(Contato contato){
        this.contatos.add(contato);
    }

    public void removeContato(Contato contato){
        this.contatos.remove(contato);
    }

    @Override
    public String toString() {
        StringBuilder contatoFormatado = new StringBuilder();
        for(Contato contato : contatos){
            contatoFormatado.append("\n\tNome: ").append(contato.getNome());
            contatoFormatado.append("\n\tTelefone: ").append(contato.getTelefone());
            contatoFormatado.append("\n\tEmail: ").append(contato.getEmail());
            contatoFormatado.append("\n");
        }
        return "Nome da agenda: " + nome +
                "\nContatos:" + contatoFormatado + "\n";
    }
}













