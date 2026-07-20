<?php
    require "../Conexao.php";

    $sql = "SELECT * FROM usuario ORDER BY id_usuario DESC";
    $pdo = Conexao::getConnection();

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $acao = "update";
        $sql = "SELECT * FROM usuario WHERE id_usuario = :id";
        $pdo = Conexao::getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":id" => $id]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome = $usuario["nome"];
        $email = $usuario["email"];
        $senha = $usuario["senha"];
        $cpf = $usuario["cpf"];
    } else {
        $acao = "insert";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulário de usuário</title>
</head>
<body>
    <form action="../processa/<?= $acao ?>.php" method="post">
        <input type="hidden" name="tabela" value="usuario">
        <input type="hidden" name="id" value="<?= $id ?>">

        <label>
            Nome:
            <input type="text" name="nome" value="<?= $nome ?? '' ?>">
        </label>
        <label>
            Email:
            <input type="text" name="email" value="<?= $email ?? '' ?>">
        </label>
        <label>
            CPF:
            <input type="text" name="cpf" value="<?= $senha ?? '' ?>">
        </label>
        <label>
            Senha:
            <input type="text" name="senha" value="<?= $cpf ?? '' ?>">
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
                        <?= $key['email'] ?>
                    </td>
                    <td>
                        <?= $key['senha'] ?>
                    </td>
                    <td>
                        <?= $key['cpf'] ?>
                    </td>
                    <td>
                        <form action="../processa/delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $key['id_usuario'] ?>">
                            <input type="hidden" name="tipo" value="4">
                            <button type="submit">Excluir</button>
                        </form>
                        <form action="formUsuario.php" method="post">
                            <input type="hidden" name="id" value="<?= $key['id_usuario'] ?>">
                            <button type="submit">Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>