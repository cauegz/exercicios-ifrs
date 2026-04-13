package conta.src;

import conta.entities.Conta;

import java.util.Locale;
import java.util.Scanner;

public class Program {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        Locale.setDefault(Locale.US);

        System.out.print("Nome do titular da conta: ");
        String nome = sc.nextLine();
        System.out.print("Número da conta: ");
        String numeroConta = sc.nextLine();
        System.out.println("A conta é de tranferência? (s/n): ");
        char resp = sc.nextLine().charAt(0);

        Conta conta;
        if(resp == 's'){
            System.out.println("Saldo da conta: ");
            double saldo = sc.nextDouble();
            conta = new Conta(saldo, numeroConta, nome);
        } else {
            conta = new Conta(numeroConta, nome);
        }

        System.out.println("Valor do saque: ");
        double saque = sc.nextDouble();
        conta.sacar(saque);
        System.out.println("Valor do deposito: ");
        double deposito = sc.nextDouble();
        conta.depositar(deposito);

        System.out.println(conta);

        sc.close();
    }
}
