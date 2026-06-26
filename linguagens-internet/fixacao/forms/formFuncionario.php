<?php
    require "../Conexao.php";

    $sql = "SELECT * FROM funcionario ORDER BY id_funcionario DESC";
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

    <table border="1">
        <thead>
            <tr>
                <th>
                    Nome
                </th>
                <th>
                    Salário
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
                        <?= $key['salario'] ?>
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