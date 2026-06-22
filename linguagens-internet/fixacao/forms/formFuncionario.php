<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulário de funcionário</title>
</head>
<body>
    <form action="../processa/insert.php" method="post">
        <input type="hidden" name="tabela" value="funcionario">
        <label>
            Nome:
            <input type="text" name="nome">
        </label>
        <label>
            Salário:
            <input type="number" step="0.01" name="salario">
        </label>
        <label>
            CPF:
            <input type="text" name="cpf">
        </label>
        <button>enviar</button>
    </form>
</body>
</html>