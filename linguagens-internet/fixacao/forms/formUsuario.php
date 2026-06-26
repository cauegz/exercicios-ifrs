<?php
    require "../Conexao.php";

    $sql = "SELECT * FROM usuario ORDER BY id_usuario DESC";
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
    <title>formulário de usuário</title>
</head>
<body>
    <form action="../processa/insert.php" method="post">
        <input type="hidden" name="tabela" value="usuario">
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

    <table border="1">
        <thead>
            <tr>
                <th>
                    Nome
                </th>
                <th>
                    Email
                </th>
                <th>
                    Senha
                </th>
                <th>
                    CPF
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
                        <?= $key['email'] ?>
                    </td>
                    <td>
                        <?= $key['senha'] ?>
                    </td>
                    <td>
                        <?= $key['cpf'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>