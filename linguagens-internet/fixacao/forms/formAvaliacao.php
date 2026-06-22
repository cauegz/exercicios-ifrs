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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulário de avaliação</title>
</head>
<body>
    <form action="../processa/insert.php" method="post">
        <input type="hidden" name="tabela" value="avaliacao">
        <label>
            Nota:
            <input type="number" step="1" name="nota">
        </label>
        <label>
            Comentário:
            <input type="text" name="comentario">
        </label>
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
        <button>enviar</button>
    </form>
</body>
</html>