<?php
include_once(__DIR__.'/../../vendor/autoload.php');

use NotaFacil\Common\Services\UserNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

try {

    $credentialsToken = [
        "consumer-id" => "iUDo9xQ2XXFCEnSFxG7eQA==",
        "token-bearer" => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkubm90YWZhY2lsLmxvY2FsXC92MVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MjU3NzAyOTMsImV4cCI6MTcxNTc3MDI5MywibmJmIjoxNjI1NzcwMjkzLCJqdGkiOiJOa0FBcjVvTDhmYjM5dHkyIiwic3ViIjoyLCJwcnYiOiI2NzVmYWVlMzgzNWJmNTE0M2YxMmM4YWUxYWExZDFkMjc1MGFiZDUxIiwidXVpZCI6ImNlMmQ5MDEzLWE1YWYtNDVkMS04NTRkLTg2ZTQyNjQ4Zjg5MCIsImlkdXNlciI6MiwiaWRfZW1wcmVzYSI6MSwiaWRfZW1wcmVzYV9wYWkiOm51bGx9.-s9cMHF2p6Pyw7t9I1yzDAHvFKjhY45Wxqxnu0Tw0bI"
    ];

    
    $userData = (new UserNotaFacil($credentialsToken))->listAll();

    dump($userData->getContent(), $userData->getStatusCode());
      
} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}