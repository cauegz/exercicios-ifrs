<?php
    include "protege.php";
    include "funcoes_log.php";

    $path = "uploads/";
    $arquivos = [];

    foreach (scandir($path) as $arquivo) {
        if ($arquivo == "." || $arquivo == "..") {
            continue;
        }

        $arquivos[] = [
            "nome" => $arquivo,
            "tamanho" => filesize($path . $arquivo),
            "data" => filemtime($path . $arquivo)
        ];
    }

    if(isset($_GET['ordenar'])){
        $tipo = $_GET['ordenar'];

        if($tipo == "tamanho"){
            usort($arquivos, function ($a, $b) {
                return $b["tamanho"] <=> $a["tamanho"];
            });
        } elseif ($tipo == "nome") {
            usort($arquivos, function ($a, $b) {
                return $a["nome"] <=> $b["nome"];
            });
        } elseif ($tipo == "data") {
            usort($arquivos, function ($a, $b) {
                return $b["data"] <=> $a["data"];
            });
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
    <title>listagem de uploads</title>
    <style>
        .grade ul{
            list-style-type: none;
            display: flex;
            gap: 30px;
        }
        .grade ul li{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .grade ul li img{
            width: 100px;
            height: 100px;
        }
        .grade ul li i{
            margin: 10px;
            font-size: 60pt;
        }
    </style>
</head>
<body>
    <h1>Uploads realizados</h1>
    <button id="toogleView">Mudar visualização</button>
    <form action="listar_uploads.php" method="get">
        <button type="submit" name="ordenar" value="nome" id="ordenaN" onclick="salvaOrdena(this)">Ordenar por nome</button>
        <button type="submit" name="ordenar" value="tamanho" id="ordenaT" onclick="salvaOrdena(this)">Ordenar por tamanho</button>
        <button type="submit" name="ordenar" value="data" id="ordenaD" onclick="salvaOrdena(this)">Ordenar por data</button>
    </form>

    <div id="view" class="lista">
        <ul>
            <?php
            foreach ($arquivos as $arquivo) {
                if($arquivo["nome"] == "." || $arquivo["nome"] == ".."){
                    continue;
                }
                $caminho_completo = $path . $arquivo["nome"];
                $extensao = pathinfo($caminho_completo, PATHINFO_EXTENSION);

                $partes = explode( "_", $arquivo["nome"]); 
                $nome = $partes[0]; 

                for ($i = 0; $i < count($partes); $i++) { 
                    if($i != 0 && $i != count($partes) - 1){ 
                        $nome .= "_$partes[$i]"; 
                    } 
                }

                switch ($extensao) {
                    case "txt":
                        echo "<li><i class='fa-regular fa-file-lines'></i> <a href='$caminho_completo'>$nome</a> <a href='deletar_arquivo.php?arquivo=$caminho_completo'>excluir</a></li>";
                        break;
                    case "pdf":
                        echo "<li><i class='fa-regular fa-file-pdf'></i> <a href='$caminho_completo'>$nome</a> <a href='deletar_arquivo.php?arquivo=$caminho_completo'>excluir</a></li>";
                        break;
                    case "png":
                    case "jpeg":
                    case "jpg":
                        echo "<li><img src='$caminho_completo' width='25' height='25' alt='imagem do usuario'> <a href='$caminho_completo'>$nome</a> <a href='deletar_arquivo.php?arquivo=$caminho_completo'>excluir</a></li>";
                        break;
                }
            }
            escreveLogs($_SESSION['nome_usuario'] . " listou os uploads", "lista_arquivo");
            ?>
        </ul>
    </div>

    <a href="index.php">voltar</a>
    <script src="https://kit.fontawesome.com/c25eca0384.js" crossorigin="anonymous"></script>

    <script>
        if(!window.location.href.includes("ordenar")){
            if(localStorage.getItem("ordena")){
                window.location.href = "http://localhost/src/listar_uploads.php?ordenar=" + localStorage.getItem("ordena");
            }
        }

        bloco = document.getElementById("view");
        classe = "grade";
        visualizacaoSalva = localStorage.getItem("view");

        if(visualizacaoSalva == "grade"){
            bloco.classList.add(classe);
            bloco.classList.remove("lista");
        } 
        if(visualizacaoSalva == "lista"){
            bloco.classList.add("lista");
            bloco.classList.remove(classe);
        }

        document.getElementById("toogleView").addEventListener("click", () => {
            if(!bloco.classList.contains(classe)){
                bloco.classList.add(classe);
                bloco.classList.remove("lista");
            } else {
                bloco.classList.add("lista");
                bloco.classList.remove(classe);
            }
            localStorage.setItem("view", bloco.className);
        });

        function salvaOrdena(botao){
            localStorage.setItem("ordena", botao.value);
        }
    </script>
</body>
</html>