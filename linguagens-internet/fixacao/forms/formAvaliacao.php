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

    $sql = "SELECT 
                a.id_avaliacao,
                a.nota, 
                a.comentario, 
                u.nome as usuario, 
                f.nome as funcionario 
            FROM avaliacao a
                JOIN usuario u ON a.id_usuario = u.id_usuario
                JOIN funcionario f ON a.id_funcionario = f.id_funcionario
            ORDER BY a.id_avaliacao DESC";  

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $acao = "update";
        $sql = "SELECT * FROM avaliacao WHERE id_avaliacao = :id";
        $pdo = Conexao::getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":id" => $id]);
        $avaliacao = $stmt->fetch(PDO::FETCH_ASSOC);
        $nota = $avaliacao["nota"];
        $comentario = $avaliacao["comentario"];
        $id_usuario = $avaliacao["id_usuario"];
        $id_funcionario = $avaliacao["id_funcionario"];
    } else {
        $acao = "insert";
        $id_usuario = "";
        $id_funcionario = "";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulário de avaliação</title>
</head>
<body>
    <form action="../processa/<?= $acao ?>.php" method="post">
        <input type="hidden" name="tabela" value="avaliacao">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label>
            Nota:
            <input type="number" step="1" name="nota" value="<?= $nota ?? '' ?>">
        </label>
        <label>
            Comentário:
            <input type="text" name="comentario" value="<?= $comentario ?? ''?>">
        </label>
        <label>
            Cliente:
            <select name="id_usuario">
                <?php foreach($usuarios as $usuario): ?>
                    <option 
                        value="<?= $usuario['id_usuario'] ?>"
                        <?= $usuario['id_usuario'] == $id_usuario ? "selected" : '' ?>
                    >
                        <?= $usuario['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>
            Funcionário:
            <select name="id_funcionario">
                <?php foreach($funcionarios as $funcionario): ?>
                    <option 
                        value="<?= $funcionario['id_funcionario'] ?>"
                        <?= $funcionario['id_funcionario'] == $id_funcionario ? "selected" : '' ?>
                    >
                    <?= $funcionario['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <button>enviar</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>
                    Nota
                </th>
                <th>
                    Comentário
                </th>
                <th>
                    Funcionário
                </th>
                <th>
                    Usuário
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
                        <?= $key['nota'] ?>
                    </td>
                    <td>
                        <?= $key['comentario'] ?>
                    </td>
                    <td>
                        <?= $key['funcionario'] ?>
                    </td>
                    <td>
                        <?= $key['usuario'] ?>
                    </td>
                    <td>
                        <form action="../processa/delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $key['id_avaliacao'] ?>">
                            <input type="hidden" name="tipo" value="3">
                            <button type="submit">Excluir</button>
                        </form>
                        <form action="formAvaliacao.php" method="post">
                            <input type="hidden" name="id" value="<?= $key['id_avaliacao'] ?>">
                            <button type="submit">Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>