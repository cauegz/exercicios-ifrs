/*
 *   Implemente uma classe Funcionário que deve ter o nome do funcionário, o departamento onde
 * trabalha, seu salário (double), a data de entrada no banco (String), seu RG (String) e um valor
 * booleano que indique se o funcionário está na empresa no momento ou se já foi embora.
 * Você deve criar alguns métodos de acordo com sua necessidade. Além deles, crie um metodo
 * bonifica que aumenta o salário do funcionário de acordo com o parâmetro passado como
 * argumento. Crie, também, um metodo demite, que não recebe parâmetro algum, só modifica o
 * valor booleano indicando que o funcionário não trabalha mais aqui. Identifique que informações
 * são importantes para o funcionário e o que um funcionário faz.
 *
 * Nome: Cauê Geraldi Zanardi
 * */

package relacionamento.exercicio1.entities;

public class Funcionario {
    private String nome;
    private String departamento;
    private double salario;
    private String dataEntrada;
    private String rg;
    private boolean estaNaEmpresa;

    public Funcionario(String nome, String departamento, double salario, String dataEntrada, String rg, boolean estaNaEmpresa) {
        setNome(nome);
        setDepartamento(departamento);
        setSalario(salario);
        setDataEntrada(dataEntrada);
        setRg(rg);
        setEstaNaEmpresa(estaNaEmpresa);
    }

    public Funcionario() {
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        if(nome.length() <= 2) return;
        this.nome = nome;
    }

    public String getDepartamento() {
        return departamento;
    }

    public void setDepartamento(String departamento) {
        if(departamento.length() <= 2) return;
        this.departamento = departamento;
    }

    public double getSalario() {
        return salario;
    }

    public void setSalario(double salario) {
        if(salario < 0) return;

        this.salario = salario;
    }

    public String getDataEntrada() {
        return dataEntrada;
    }

    public void setDataEntrada(String dataEntrada) {
        this.dataEntrada = dataEntrada;
    }

    public String getRg() {
        return rg;
    }

    public void setRg(String rg) {
        if(rg.length() != 9 && rg.length() != 8 && rg.length() != 10) return;
        this.rg = rg;
    }

    public boolean isEstaNaEmpresa() {
        return estaNaEmpresa;
    }

    public void setEstaNaEmpresa(boolean estaNaEmpresa) {
        this.estaNaEmpresa = estaNaEmpresa;
    }

    public void bonifica(double aumento){
        if(!isEstaNaEmpresa()) return;
        setSalario(getSalario() + aumento);
    }

    public void demite(){
        setEstaNaEmpresa(false);
    }

    @Override
    public boolean equals(Object obj){
        if(obj == null) return false;
        if(!(obj.getClass().equals(this.getClass()))) return false;
        Funcionario func = (Funcionario) obj;
        return this.getRg().equals(func.getRg());
    }

    @Override
    public String toString(){
        String estaNaEmpresa = this.isEstaNaEmpresa() ? "Ainda está na empresa" : "Não está mais na empresa";
        return "Funcionário" + "\n" +
                "\tNome: " + this.getNome() + "\n" +
                "\tSalário: " + "R$" + String.format("%.2f", this.getSalario()) + "\n" +
                "\tRG: " + this.getRg() + "\n" +
                "\tData de entrada na empresa: " + this.getDataEntrada() + "\n\t" +
                estaNaEmpresa;
    }
}
