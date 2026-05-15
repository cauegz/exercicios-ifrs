<?php
session_start();
unlink("uploads/".$_COOKIE['nome_foto']);
file_put_contents("logs/cadastro.log", "[" . date("Y-m-d H:i:s") . "] - usuário " . $_COOKIE['login'] . " fez logout");
setcookie("nome_foto", "", 0);
setcookie("hex_cor_fundo", "", 0);
setcookie("login", "", 0);
session_destroy();
header("Location: cadastro.php");