<?php
    require "../Conexao.php";

    $sql = "SELECT * FROM produto ORDER BY id_produto DESC";
    $pdo = Conexao::getConnection();

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulário de produto</title>
</head>
<body>
    <form action="../processa/insert.php" method="post">
        <input type="hidden" name="tabela" value="produto">
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
    <table border="1">
        <thead>
            <tr>
                <th>
                    Nome
                </th>
                <th>
                    Preco
                </th>
                <th>
                    Descricao
                </th>
                <th>
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $key): ?>
                <tr>
                    <td>
                        <?= $key['nome'] ?>
                    </td>
                    <td>
                        <?= $key['preco'] ?>
                    </td>
                    <td>
                        <?= $key['descricao'] ?>
                    </td>
                    <td>
                        <form action="../processa/delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $key['id_produto'] ?>">
                            <input type="hidden" name="tipo" value="1">
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>