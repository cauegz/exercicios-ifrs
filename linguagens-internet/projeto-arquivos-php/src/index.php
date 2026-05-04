<?php
    
    require_once "protege.php";
    include "funcoes_log.php";


    const MAX_MB = 10;
    const EXT_PERMITIDAS =
    [
        "png",
        "pdf",
        "jpg",
        "jpeg",
        "txt"
    ];

    if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];

        $tamanho = $arquivo['size'];
        $tamanho_maximo_permitido = MAX_MB * 1024 * 1024;
        if($tamanho > $tamanho_maximo_permitido){
            die("Arquivo excede o tamanho maximo");
        }

        $nome = basename($arquivo['name']);
        $extensao = strtolower(pathinfo($nome, PATHINFO_EXTENSION));
        $partes = explode(".", $nome);
        $nome = $partes[0];
        if(!in_array($extensao, EXT_PERMITIDAS)){
            die("Extensao não permitida");
        }

        $nome_final = $nome . "_" . uniqid() . "." . $extensao;
        $destino = "uploads/" . $nome_final;
        if(move_uploaded_file($arquivo['tmp_name'], $destino)){
            escreveLogs($_SESSION['nome_usuario'] . " fez upload do arquivo: $nome", "upload");
            echo "upload realizado com sucesso!";
        } else {
            die("Erro ao realizar upload");
        }
    }

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviar um arquivo</title>
</head>
<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="arquivo_input">Arquivo: </label> <input type="file" id="arquivo_input" name="arquivo"> <br>
        <button type="submit">Enviar</button>
    </form>

    <a href="listar_uploads.php">listar arquivos enviados</a> <br>
    <a href="logs.php">log das coisas</a>
</body>
</html>