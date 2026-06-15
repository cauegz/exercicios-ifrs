<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require "Router.php";

$router = new Router();

$router->addRoute("/exercicios-ifrs/linguagens-internet/crud/", "Usuario@criar");

$router->execute(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));