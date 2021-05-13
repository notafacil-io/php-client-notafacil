# Pacote de integração Nota Fácil | PHP Client Nota Fácil

[![Packagist](https://badgen.net/packagist/v/notafacil-io/php-client-notafacil)](https://packagist.org/packages/notafacil-io/php-client-notafacil)
[![MIT License](https://badgen.net/github/license/notafacil-io/php-client-notafacil)](https://opensource.org/licenses/MIT)
[![Releases](https://badgen.net/github/releases/notafacil-io/php-client-notafacil)](https://github.com/notafacil-io/php-client-notafacil/releases)
![Issues](https://badgen.net/packagist/ghi/notafacil-io/php-client-notafacil)
![Lang](https://badgen.net/packagist/lang/notafacil-io/php-client-notafacil)
![PHP Version](https://badgen.net/packagist/php/notafacil-io/php-client-notafacil)

Este é um PHP Client para API do [Nota Fácil](https://notafacil.io) e você pode adicionar em seu projeto para ter acesso as seguintes funcionalidades em seu projeto de maneira fácil.
- Autenticação

Para isso, você precisa de uma conta devidademente cadastrada no Nota Fácil como Softhouse. 

Para obter informações sobre o funcionamento da nossa API e contratações acesse [nosso site](https://notafacil.io).

---
<img src="https://notafacil.io/images/header/logo_header.svg" height='85px' />

---
#### Lista de conteúdo:
* [Documentação](#documentation)
* [Informações Gerais](#general-info)
* [Instalação](#installation)
    * [Via composer](#withcomposer)
    * [Sem composer](#withoutcomposer)
* [Começo rápido](#quickstart)
    * [Autenticação](#quickstart-autenticacao) 
        * [Requisitos para autenticar na API Nota Fácil](#quickstart-section-1) 
        * [Autenticando na API Nota Fácil](#quickstart-section-2)
* [Problemas?](#issue)
---
## Documentação <span id="documentation"></span>
[A documentação oficial da API Nota Fácil você pode acessar aqui.](https://docs.notafacil.io/?version=latest).

--
## Informações Gerais <span id="general-info"></span>
Para o versionamneto usamos o esquema [Semantic Version](https://semver.org/lang/pt-BR)

Publicado sob [MIT License](https://github.com/notafacil-io/php-client-notafacil/blob/main/LICENSE)

## Instalação <span id="installation"></span>
#### Via Composer <span id="withcomposer"></span>
Para começar a usar a biblioteca, como dependência adicione em seu arquivo `composer.json`, como mostrado abaixo.
```json
"require":{
    "notafacil-io/php-client-notafacil": "^1.0"
}
```
Agora basta simplesmente executar `composer install` para baixar as dependências. Ou rodar em seu terminal o comando abaixo.

```bash
composer require notafacil-io/php-client-notafacil
```
#### Sem Composer <span id="withoutcomposer"></span>
Se seu projeto o impede de usar `composer`, você pode baixar manualmente este pacote e todas as suas dependências e referenciá-las a partir de seu código. No entanto, existem soluções que podem automatizar esse processo.
Um deles é a ferramenta online `php-download`. Você pode usá-lo para encontrar [PHP Client Nota Fácil](https://php-download.com/package/notafacil-io/php-client-notafacil), baixá-lo de lá e usar em seu projeto sem coletar manualmente as dependências.

--
## Começo rápido <span id="quickstart"></span>

### Autenticação <span id="quickstart-autenticacao"></span>
#### Requisitos para autenticar na API Nota Fácil <span id="quickstart-section-1"></span>
Para realizar a autenticação e obter o token `Bearer` é obrigatório que você tenha os seguintes dados.
- `login` (Usuário que efetuará o login)
- `password` (Senha do usuário)
- `secret_key` (Chave de validação)

##### Lembrete/Alerta
**Cuidado com as suas chaves de API:** As  chaves de autenticação consegue executar qualquer operação em nossa API, então é extremamente importante que você as mantenha em um local seguro. 

#### Autenticando na API Nota Fácil <span id="quickstart-section-2"></span>

Exemplo simples para autenticar em nossa API. Caso não seja possivel autenticar será lancado uma exeção.

```php
<?php
include_once(__DIR__.'/vendor/autoload.php');

use NotaFacil\Client\Exceptions\NotaFacilException;

try {
    $credentials = [
        'login'      => 'NOME_USUARIO',
        'password'   => 'SENHA_USUARIO',
        'secret_key' => 'SECRET_KEY_SOFTHOUSE'
    ];
    
    $dataAuth = ( new \NotaFacil\Client\AuthNotaFacil() )->attempt($credentials);
    $auth = $result->responseAuth();
    
    
    var_dump($dataAuth); // Retorna uma instancia da classe AuthClient
    
    var_dump($auth); // Recebe os dados do cliente do nota facil autenticado

} catch (NotaFacilException $th) {
    var_dump($th);
}

```
##### Você tambem pode ver esse exemplo nessa pasta `./exemple/01-authenticate.php` e testar com o seguinte comando `php -S localhost:8000 ./exemple/01-authenticate.php`

--
## Problemas? <span id="issue"></span>

Sinta-se à vontade para abrir uma `issue` no repositório para qualquer problema ou solicitação de recurso. Para obter detalhes de como enviar sua solicitação, verifique o arquivo [CONTRIBUTING][contributing].

Se entretanto for algo que requer nossa atenção iminente, sinta-se à vontade para nos contatar [suporte@notafacil.io](mailto:suporte@notafacil.io).

[contributing]:CONTRIBUTING.md