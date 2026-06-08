/*
 *   Crie uma classe para testar a classe Funcionario chamada FuncionarioTeste. Esta nova classe
 * deve conter o metodo main.
 * Um esboço da classe que possui o FuncionarioTeste:
 * public class FuncionarioTeste {
 *     public static void main(String[] args) {
 *         testaFuncionario();
 *     }
 *     public void testaFuncionario(){
 *         Funcionario meuFuncionario = new Funcionario();
 *         //Atribua valores ao funcionário, passando o salario = 1000
 *         //Execute o metodo bonifica passando o valor 100
 *         //Imprima o salario atual
 *     }
 * }
 *   Incremente essa classe. Faça outros testes, imprima outros atributos e invoque os métodos que
 * você criou a mais. Teste valores inválidos. Lembre-se de seguir a convenção java, isso é
 * importantíssimo. Isto é, nomeDeAtributo, nomeDeMetodo, nomeDeVariavel, NomeDeClasse, etc...
 *
 * Nome: Cauê Geraldi Zanardi
 * */

package relacionamento.exercicio1.src;

import relacionamento.exercicio1.entities.Funcionario;

public class TestaFuncionario {
    static void main(String[] args) {
        testaFuncionario();
        testaFuncionarioIgual();
    }
    public static void testaFuncionario(){
        Funcionario funcionarioAtual = new Funcionario("joao", "desenvolvimento", 1000.00, "12/10/2026", "5132808084", true);
        funcionarioAtual.setSalario(-1000);
        funcionarioAtual.bonifica(100);
        System.out.println(funcionarioAtual);
        funcionarioAtual.demite();
        System.out.println(funcionarioAtual);
    }

    public static void testaFuncionarioIgual(){
        Funcionario f1 = new Funcionario("maria", "desenvolvimento", 10000, "01/01/1991", "1111111111", true);
        Funcionario f2 = new Funcionario("maria", "desenvolvimento", 10000, "01/01/1991", "1111111110", true);
        if(f1.equals(f2)){
            System.out.println("\nOs funcionários são iguais");
        } else {
            System.out.println("\nOs funcionários não são iguais");
        }
    }
}
