<?php
require_once "Conexao.php";

if(isset($_POST['insert'])){
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO produtos (nome, preco, descricao) VALUES (:nome, :preco, :descricao)";
    $pdo = new Conexao;
    $pdo = $pdo::getConnection();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":nome", $nome); 
    $stmt->bindParam(":preco", $preco); 
    $stmt->bindParam(":descricao", $descricao); 
    $stmt->execute();
}
if(isset($_GET['editar'])){
    $nomeNovo = $_POST['nome'];
    $precoNovo = $_POST['preco'];
    $descricaoNovo = $_POST['descricao'];

    $sql = "UPDATE produtos SET nome = :nome, preco = :preco, descricao = :descricao WHERE id_produto = :id";
    $pdo = new Conexao;
    $pdo = $pdo::getConnection();
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":nome", $nomeNovo);
    $stmt->bindParam(":preco", $precoNovo);
    $stmt->bindParam(":descricao", $descricaoNovo);
    $stmt->bindParam(":id", $_GET['editar']);

    $stmt->execute();
}
if(isset($_GET['comeco_editar'])){
    $sql = "SELECT * FROM produtos WHERE id_produto = :id";
    $pdo = new Conexao;
    $pdo = $pdo::getConnection();
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(":id", $_GET['comeco_editar']);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $nomeEditar = $result['nome'];
    $precoEditar = $result['preco'];
    $descricaoEditar = $result['descricao'];

    }
if(isset($_GET['excluir'])){
    $sql = "DELETE FROM produtos WHERE id_produto = :id";
    $pdo = new Conexao;
    $pdo = $pdo::getConnection();
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":id", $_GET['excluir']);

    $stmt->execute();
}
$sql = "SELECT * FROM produtos";
$pdo = new Conexao;
$pdo = $pdo::getConnection();
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aula</title>
</head>
<body>
    <form action="index.php" method="post">
        <h1>Insert</h1>
        <input type="text" name="nome" id="nome_input">
        <input type="number" name="preco" id="preco_input">
        <input type="text" name="descricao" id="descricao_input">
        <button type="submit" name="insert">insert</button>
    </form>
    <form action="index.php?editar=<?= $_GET['comeco_editar'] ?>" method="post">
        <h1>Update</h1>
        <input type="hidden" name="id_produto" value="<?= $_GET['comeco_editar'] ?>">
        <input type="text" name="nome" id="nome_input" value="<?= $nomeEditar ?>">
        <input type="number" name="preco" id="preco_input" value="<?= $precoEditar ?>">
        <input type="text" name="descricao" id="descricao_input" value="<?= $descricaoEditar ?>">
        <button type="submit" name="editar">update</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <td>id</td>
                <td>nome</td>
                <td>preco</td>
                <td>descricao</td>
                <td>acoes</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($result)){
                foreach($result as $row){
                    echo "
                        <tr>
                            <td>{$row['id_produto']}</td>
                            <td>{$row['nome']}</td>
                            <td>{$row['preco']}</td>
                            <td>{$row['descricao']}</td>
                            <td><a href='index.php?comeco_editar={$row['id_produto']}'>editar</a> <a href='index.php?excluir={$row['id_produto']}'>excluir</a></td>
                        </tr>
                    ";
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>