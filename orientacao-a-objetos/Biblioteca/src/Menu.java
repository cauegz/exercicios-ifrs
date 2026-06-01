package Biblioteca.src;

public class Menu {
    public String exibeMenu(){
        return """
                ----- Bem vindo ao sistema de gerenciamento de biblioteca -----\s
                Digite a opção correspondente ao item do menu.\s
                1 - Registrar um novo empréstimo\s
                2 - Consultar os empréstimos atuais\s
                3 - Fechar o sistema\s
                """;
    }
}
