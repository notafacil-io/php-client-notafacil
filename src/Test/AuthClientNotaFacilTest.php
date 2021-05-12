<?php
namespace NotaFacil\Client\Test;

use PHPUnit\Framework\TestCase;
use NotaFacil\Client\Auth\AuthClientNotaFacil;
use NotaFacil\Client\Exceptions\NotaFacilException;

class AuthClientNotaFacilTest extends TestCase
{
    /**
    * @test
    */
    public function shouldAttemptLoginWhithCredentialsWithValid()
    {

        $dataAuth = new AuthClientNotaFacil();
        $credentials = $dataAuth->config['credentials-valid'];

        $resonse = $dataAuth->attempt($credentials);
        $dataAuth = $resonse->getDataAuth();
        
        $this->assertTrue(($resonse instanceof AuthClientNotaFacil && !empty($dataAuth['user'])));
    }

   /**
    * @test
    */
    public function shouldThrowExceptionWhenAttemptLoginWhithIvalidSecretKey()
    {
        $this->expectException(NotaFacilException::class);

        $dataAuth = new AuthClientNotaFacil();
        $credentials = $dataAuth->config['credentials-invalid-softhouse'];
        
        $resonse = $dataAuth->attempt($credentials);
        
    }
    
   /**
    * @test
    */
    public function shouldThrowExceptionWhenAttemptLoginWhithIvalidCredentials() 
    {
        $this->expectException(NotaFacilException::class);

        $dataAuth = new AuthClientNotaFacil();
        $credentials = $dataAuth->config['credentials-invalid-credentials'];

        $resonse = $dataAuth->attempt($credentials);
        
    }
    
}
