<?php
namespace NotaFacil\Client\Test;

use PHPUnit\Framework\TestCase;
use NotaFacil\Client\ClientNotaFacil;
use NotaFacil\Client\Exceptions\NotaFacilException;

class ClientNotaFacilTest extends TestCase
{
    /**
    * @test
    */
    public function shouldAttemptLoginWhithCredentialsWithValid()
    {

        $dataAuth = new ClientNotaFacil();
        $credentials = $dataAuth->config['credentials-valid'];

        $resonse = $dataAuth->attempt($credentials);
        $dataAuth = $resonse->responseAuth();
        
        $this->assertTrue(($resonse instanceof ClientNotaFacil && !empty($dataAuth['user'])));
    }

   /**
    * @test
    */
    public function shouldThrowExceptionWhenAttemptLoginWhithIvalidSecretKey()
    {
        $this->expectException(NotaFacilException::class);

        $dataAuth = new ClientNotaFacil();
        $credentials = $dataAuth->config['credentials-invalid-softhouse'];
        
        $resonse = $dataAuth->attempt($credentials);
        
    }
    
   /**
    * @test
    */
    public function shouldThrowExceptionWhenAttemptLoginWhithIvalidCredentials() 
    {
        $this->expectException(NotaFacilException::class);

        $dataAuth = new ClientNotaFacil();
        $credentials = $dataAuth->config['credentials-invalid-credentials'];

        $resonse = $dataAuth->attempt($credentials);
        
    }
    
}
