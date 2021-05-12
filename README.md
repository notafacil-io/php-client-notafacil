# Pacote de integração Nota Fácil | Autenticação

[![Packagist](https://badgen.net/packagist/v/notafacil-io/client-nf-php)](https://packagist.org/packages/notafacil-io/client-nf-php)
[![MIT License](https://badgen.net/github/license/notafacil-io/client-nf-php)](https://opensource.org/licenses/MIT)

Este pacote foi construído com o objetivo de simplificar a integração com a API do [Nota Fácil](https://notafacil.io).
Para obter informações sobre o funcionamento e contratações acesse [nosso site](https://notafacil.io) ou a [documentação oficial](https://docs.notafacil.io/?version=latest).

---
Instalação
------------

```bash
composer require notafacil-io/client-notafacil-php
```

Exemplo de uso
-----

O modo simples de usar esse pacote

```php
<?php
include_once(__DIR__.'/../vendor/autoload.php');


$credentials = [
    'login'      => 'nome_usuario',
    'password'   => 'senha_usuario',
    'secret_key' => 'secret-key-softhouse',
];

$dataAuth = new \NotaFacil\Client\AuthNotaFacil();
$result = $dataAuth->attempt($credentials);
$auth = $result->getDataAuth();

// Retorna uma instancia da classe AuthClient
var_dump($result);
// Recebe os dados do cliente do nota facil autenticado
var_dump($auth);

die();
```