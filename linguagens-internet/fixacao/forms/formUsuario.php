<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulário de usuário</title>
</head>
<body>
    <form action="../processa/insert.php" method="post">
        <label>
            Nome:
            <input type="text" name="nome">
        </label>
        <label>
            Email:
            <input type="text" name="email">
        </label>
        <label>
            CPF:
            <input type="text" name="cpf">
        </label>
        <label>
            Senha:
            <input type="text" name="senha">
        </label>
        <button>enviar</button>
    </form>
</body>
</html>