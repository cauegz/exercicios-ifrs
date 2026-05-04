<?php
    session_start();
    if(!isset($_SESSION['id_usuario']) && !isset($_COOKIE['lembrar'])){
        header("Location: login.php");
        exit;
    }

    if(!isset($_SESSION['id_usuario']) && isset($_COOKIE['lembrar'])){
        $token = explode(":", $_COOKIE['lembrar']);
        $selector = $token[0];
        $validator = $token[1];

        $sql = "SELECT * FROM remember_tokens WHERE selector = :selector";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":selector", $selector);
        $stmt->execute();

        $token_banco = $stmt->fetch(PDO::FETCH_ASSOC);
        $validator_hash = $token_banco['validator_hash'];

        if(password_verify($validator, $validator_hash)){
            $_SESSION['id_usuario'] = $token_banco['id_usuario'];
            header("Location: index.php");
            exit;
        }
    }