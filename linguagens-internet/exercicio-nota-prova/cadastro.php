<?php
    date_default_timezone_set("America/Sao_Paulo");
    const MAX_MB = 10;
    const EXT_PERMITIDAS = [
        'jpg',
        'jpeg',
        'png',
        'webp'
    ];
    const PASTA_UPLOAD = __DIR__ . "/uploads";

    if($_POST){
        $nome = $_POST['nome-cadastro'];
        $senha = password_hash($_POST['senha-cadastro'], PASSWORD_DEFAULT);
        $cor = $_POST['cor-cadastro'];
        $foto = $_FILES['foto-cadastro'];

        if(isset($nome) && isset($senha) && isset($foto) && isset($cor)){
            session_start();
            $_SESSION['nome-cadastro'] = $nome;
            $_SESSION['senha-cadastro'] = $senha;
        
    
            if($foto['size'] > (MAX_MB * 1024 * 1024)){
                die("Tamanho máximo excedido");
            }
            if(!in_array(pathinfo($foto['name'], PATHINFO_EXTENSION), EXT_PERMITIDAS)){
                die("Extensão não permitida");
            }

            $nome_final = uniqid() . '_' . basename($foto['name']);

            if(!move_uploaded_file($foto['tmp_name'], PASTA_UPLOAD . '/' . $nome_final)){
                die("deu pau ao mover a foto");
            }

            if(!setcookie(
                "nome_foto",
                $nome_final,
                time() + (60*60*24),
                "/",
                "localhost"
            )){
                die("deu pau no cookie de foto");
            }

            if(!setcookie(
                "hex_cor_fundo",
                $cor,
                time() + (60*60*24),
                "/",
                "localhost"
            )){
                die("deu pau no cookie da cor");
            }

            if(!setcookie(
                "login",
                $nome,
                time() + (60*60*24),
                "/",
                "localhost"
            )){
                die("deu pau no cookie do login");
            }

            file_put_contents("logs/cadastro.log", "[". date("Y-m-d H:i:s") . "] - usuário $nome se cadastrou" . PHP_EOL, FILE_APPEND);
            header("Location: perfil.php");
        }   
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="cadastro.php" method="post" enctype="multipart/form-data">
        <label for="input-nome">Nome: <input type="text" name="nome-cadastro" id="input-nome"></label><br>
        <label for="input-senha">Senha: <input type="password" name="senha-cadastro" id="input-senha"></label><br>
        <label for="input-cor-fundo">Cor de fundo: <input type="color" name="cor-cadastro"></label><br>
        <label for="input-foto">Foto de perfil: <input type="file" name="foto-cadastro" id="input-cadastro"></label><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>