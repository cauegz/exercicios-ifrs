<?php

function escreveLogs(string $mensagem, string $acao)
{
    date_default_timezone_set("America/Sao_Paulo");
    $dataHora = date("d/m/Y H:i:s");
    $msg = "[$dataHora]: $mensagem";
    if(file_put_contents("logs/$acao.txt", $msg . " <br>" . PHP_EOL, FILE_APPEND)){
        return true;
    } else {
        return false;
    }
}

function listaLogs(string $arquivo)
{
    return file_get_contents("logs/$arquivo.txt");
}