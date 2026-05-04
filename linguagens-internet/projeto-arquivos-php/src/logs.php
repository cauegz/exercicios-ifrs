<?php
    include "protege.php";
    include "funcoes_log.php";
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>logs</title>
</head>
<body>
    <h1>Deletar arquivos</h1>
    <?php
        echo listaLogs("deleta_arquivo")
    ?>
    <h1>Listar arquivos</h1>
    <?php
        echo listaLogs("lista_arquivo")
    ?>
    <h1>Login</h1>
    <?php
        echo listaLogs("login")
    ?>
    <h1>Upload</h1>
    <?php
        echo listaLogs("upload")
    ?>
</body>
</html>
