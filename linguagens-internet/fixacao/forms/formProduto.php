<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulário de produto</title>
</head>
<body>
    <form action="../processa/insert.php" method="post">
        <label>
            Nome:
            <input type="text" name="nome">
        </label>
        <label>
            Preco:
            <input type="number" step="0.01" name="preco">
        </label>
        <label>
            Descricao:
            <input type="text" name="descricao">
        </label>
        <button>enviar</button>
    </form>
</body>
</html>