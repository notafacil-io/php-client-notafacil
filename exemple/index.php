<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once(__DIR__.'/../vendor/autoload.php');
use NotaFacil\Client\Auth\AuthClient;

$credentials = [
    'login'      => 'nome_usuario',
    'password'   => 'senha_usuario',
    'secret_key' => 'secret-key-softhouse',
];

$dataAuth = new AuthClient();
$result = $dataAuth->attempt($credentials);
$auth = $result->getDataAuth();

// Retorna uma instancia da classe AuthClient
dump($result);
// Recebe os dados da credencial autenticado
dump($auth);

die();