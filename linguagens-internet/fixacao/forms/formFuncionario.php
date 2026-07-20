<?php
    require "../Conexao.php";

    $sql = "SELECT * FROM funcionario ORDER BY id_funcionario DESC";
    $pdo = Conexao::getConnection();

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $acao = "update";
        $sql = "SELECT * FROM funcionario WHERE id_funcionario = :id";
        $pdo = Conexao::getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":id" => $id]);
        $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome = $funcionario["nome"];
        $salario = $funcionario["salario"];
        $cpf = $funcionario["cpf"];
    } else {
        $acao = "insert";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulário de funcionário</title>
</head>
<body>
    <form action="../processa/<?= $acao ?>.php" method="post">
        <input type="hidden" name="tabela" value="funcionario">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label>
            Nome:
            <input type="text" name="nome" value="<?= $nome ?? '' ?>">
        </label>
        <label>
            Salário:
            <input type="number" step="0.01" name="salario" value="<?= $salario ?? '' ?>">
        </label>
        <label>
            CPF:
            <input type="text" name="cpf" value="<?= $cpf ?? '' ?>">
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
                        <?= $key['salario'] ?>
                    </td>
                    <td>
                        <?= $key['cpf'] ?>
                    </td>
                    <td>
                        <form action="../processa/delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $key['id_funcionario'] ?>">
                            <input type="hidden" name="tipo" value="2">
                            <button type="submit">Excluir</button>
                        </form>
                        <form action="formFuncionario.php" method="post">
                            <input type="hidden" name="id" value="<?= $key['id_funcionario'] ?>">
                            <button type="submit">Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>