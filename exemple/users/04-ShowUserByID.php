<?php
include_once(__DIR__.'/../../vendor/autoload.php');

use NotaFacil\Common\Services\UserNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

try {

    $credentials = [
        "consumer-id" => "iUDo9xQ2XXFCEnSFxG7eQA==",
        "token-bearer" => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkubm90YWZhY2lsLmxvY2FsXC92MVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MTQ3OTg5MDEsImV4cCI6MTcwNDc5ODkwMSwibmJmIjoxNjE0Nzk4OTAxLCJqdGkiOiJlZmpZbUtOcDlyejVkeUJlIiwic3ViIjoyLCJwcnYiOiI2NzVmYWVlMzgzNWJmNTE0M2YxMmM4YWUxYWExZDFkMjc1MGFiZDUxIiwidXVpZCI6IjE4Yjk0Y2Q3LTRlOTEtNGIxNC1hZDQyLTYwZDNjN2I1Mjk5ZCIsImlkdXNlciI6MiwiaWRfZW1wcmVzYSI6MSwiaWRfZW1wcmVzYV9wYWkiOm51bGx9.1cYeBsTMuHSOURaEmf6gGwNCh0m5w_v7rpXjDLVf1bA"
    ];
    
    $userData = (new UserNotaFacil($credentials))->showByID(2);

    dump($userData->getContent(), $userData->getStatusCode());
      
} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}