<?php
    session_start();

    if(!isset($_SESSION['nome-cadastro'])){
        if(!isset($_COOKIE['login'])){
            header("Location: cadastro.php");
        }
        $_SESSION['nome-cadastro'] = $_COOKIE['login'];
    }

    $nome = $_SESSION['nome-cadastro'];
    $foto = $_COOKIE['nome_foto'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perfil</title>
</head>
<body>
    <h1>Bem vindo, <?=  $nome ?> </h1>

    <img src="uploads/<?= $foto ?>" alt="foto de perfil">

    <?= "<script>document.body.style.backgroundColor = '" . $_COOKIE['hex_cor_fundo'] . "';</script>" ?>

    <br><a href="logout.php">logout</a>
</body>
</html>