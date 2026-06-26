<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    require "../Conexao.php";

    $pdo = Conexao::getConnection();

    $sql = "SELECT * FROM usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM funcionario";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM produto ORDER BY id_produto DESC";
    $pdo = Conexao::getConnection();

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll();

    //TODO:
    // 1 - passar o carrinho para outra página, porque eu não consigo adicionar alguma coisa na tabela produto_venda sem ter uma venda
     
    if(isset($_GET['carrinho'])){
        $id_produto = $_GET['carrinho'];

        $sql = "SELECT 1 FROM produto p WHERE id_produto = :id";
        $stmt = $pdo->prepare($sql);

        if($stmt->execute(["id" => $id_produto])){

        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir uma venda</title>
</head>
<body>
    <form action="../processa/insert.php" method="post">
        <input type="hidden" name="tabela" value="venda">
        <label>
            Cliente:
            <select name="id_usuario">
                <?php foreach($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id_usuario'] ?>">
                        <?= $usuario['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>
            Funcionário:
            <select name="id_funcionario">
                <?php foreach($funcionarios as $funcionario): ?>
                    <option value="<?= $funcionario['id_funcionario'] ?>">
                        <?= $funcionario['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>
            Data da venda:
            <input type="date" name="data"></input>
        </label>
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
                        <a href="formVenda.php?carrinho=<?=$key['id_produto']?>">carrinho</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>