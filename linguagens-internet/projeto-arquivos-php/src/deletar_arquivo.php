<?php
include "protege.php";
include "funcoes_log.php";

$caminho = "uploads/";
$nome = basename($_GET['arquivo']);
$caminho_final = $caminho . $nome;

if(is_file($caminho_final)){
    if(unlink($caminho_final)){
        escreveLogs($_SESSION['nome_usuario'] . " deletou o arquivo $nome", "deleta_arquivo");
        header("Location: listar_uploads.php");
    }
    else {
        header("Location: listar_uploads.php");
    }
} else {
    header("Location: listar_uploads.php");
}