package produto.src;

import produto.entities.Produto;

import java.util.Locale;

public class TestaProduto {
    public static void main(String[] args) {
        Locale.setDefault(Locale.US);
        Produto prod = new Produto(0.01, "a");

        prod.setParcelas(12).setDesconto(10).setNome("a");

        System.out.println(prod);
    }
}
