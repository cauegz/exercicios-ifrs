<?php

class Router{
    private array $routes = [];

    public function addRoute(string $url, string $acao){
        $this->routes[$url] = $acao;
    }

    public function execute($url){
        if($this->routes[$url] == null){
            http_response_code(404);
            die("erro 404");
        }
        [$controlador, $funcao] = explode("@", $this->routes[$url]);
        $controlador = "Controlador" . $controlador;

        $path = "controllers/" . $controlador . ".php";

        if(!file_exists($path)) die("erro 404 (arquivo não existe)");
        
        require_once $path;

        if(!class_exists($controlador)) die("erro 404 (classe não existe)");
        
        $instance = new $controlador();
        
        if(!method_exists($controlador, $funcao)) die("erro 404 (método não existe)");

        $instance->$funcao();
    }
}