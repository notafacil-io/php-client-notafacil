# Pacote de integração Nota Fácil | PHP Client Nota Fácil

[![Packagist](https://badgen.net/packagist/v/notafacil-io/client-notafacil-php)](https://packagist.org/packages/notafacil-io/client-notafacil-php)
[![MIT License](https://badgen.net/github/license/notafacil-io/client-notafacil-php)](https://opensource.org/licenses/MIT)
[![Releases](https://badgen.net/github/releases/notafacil-io/client-notafacil-php)](https://github.com/notafacil-io/client-notafacil-php/releases)
![Issues](https://badgen.net/packagist/ghi/notafacil-io/client-notafacil-php)
![Lang](https://badgen.net/packagist/lang/notafacil-io/client-notafacil-php)
![PHP Version](https://badgen.net/packagist/php/notafacil-io/client-notafacil-php)

Este é um PHP Client para API do [Nota Fácil](https://notafacil.io) e você pode usá-lo como uma dependência para adicionar as seguintes funcionalidades em seu projeto.
- Autenticação

Para usar isso, você precisa de uma conta devidademente cadastrada no Nota Fácil como Softhouse. 

Para obter informações sobre o funcionamento e contratações acesse [nosso site](https://notafacil.io).

---
<img src="https://notafacil.io/images/header/logo_header.svg" height='85px' />

#### Tabela de conteúdo:
* [Documentação](#documentation)
* [Informações Gerais](#general-info)
* [Instalação](#installation)


## Documentação <span id="documentation"></span>
[A documentação oficial da API Nota Fácil você pode acessar aqui.](https://docs.notafacil.io/?version=latest).

## Informações Gerais <span id="general-info"></span>
Para o versionamneto usamos o esquema [Semantic Version](https://semver.org/lang/pt-BR)

Publicado sob [MIT License](https://github.com/notafacil-io/client-notafacil-php/blob/main/LICENSE)

## Instalação <span id="installation"></span>
Para começar a usar a biblioteca, como dependência em seu arquivo `composer.json` como mostrado abaixo.
```json
"require":{
    "notafacil-io/client-notafacil-php": "1.0.0"
}
```


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

$authNotaFacil = (new \NotaFacil\Client\AuthNotaFacil())->attempt($credentials);
$auth = $authNotaFacil->responseAuth();
 
// Retorna uma instancia da classe AuthClient
var_dump($result);
// Recebe os dados do cliente do nota facil autenticado
var_dump($auth);

die();
```