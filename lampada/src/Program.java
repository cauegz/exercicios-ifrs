package src;

import entities.Lampada;

import java.util.Scanner;

public class Program {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        System.out.print("Estado da lâmpada (0 = desligada | 1 = ligada): ");
        int aux = sc.nextInt();
        boolean ligada = (aux != 0);

        System.out.print("Watts (-1 = valor padrão): ");
        int watts = sc.nextInt();

        Lampada lamp = new Lampada(ligada, watts);

        lamp.exibe();
        
        sc.close();
    }
}
