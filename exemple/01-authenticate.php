<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once(__DIR__.'/../vendor/autoload.php');


$credentials = [
    'login'      => 'nome_usuario',
    'password'   => 'senha_usuario',
    'secret_key' => 'secret-key-softhouse',
];

$dataAuth = new \NotaFacil\Client\AuthNotaFacil();
$result = $dataAuth->attempt($credentials);
$auth = $result->responseAuth();

// Retorna uma instancia da classe AuthClient
var_dump($result);
// Recebe os dados do cliente do nota facil autenticado
var_dump($auth);

die();