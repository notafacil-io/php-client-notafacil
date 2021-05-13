<?php
namespace NotaFacil\Client\Test;

use PHPUnit\Framework\TestCase;
use NotaFacil\Client\AuthNotaFacil;
use NotaFacil\Client\Exceptions\NotaFacilException;

class AuthNotaFacilTest extends TestCase
{
    /**
    * @test
    */
    public function shouldAttemptLoginWhithCredentialsWithValid()
    {

        $dataAuth = new AuthNotaFacil();
        $credentials = $dataAuth->config['credentials-valid'];

        $resonse = $dataAuth->attempt($credentials);
        $dataAuth = $resonse->responseAuth();
        
        $this->assertTrue(($resonse instanceof AuthNotaFacil && !empty($dataAuth['user'])));
    }

   /**
    * @test
    */
    public function shouldThrowExceptionWhenAttemptLoginWhithIvalidSecretKey()
    {
        $this->expectException(NotaFacilException::class);

        $dataAuth = new AuthNotaFacil();
        $credentials = $dataAuth->config['credentials-invalid-softhouse'];
        
        $resonse = $dataAuth->attempt($credentials);
        
    }
    
   /**
    * @test
    */
    public function shouldThrowExceptionWhenAttemptLoginWhithIvalidCredentials() 
    {
        $this->expectException(NotaFacilException::class);

        $dataAuth = new AuthNotaFacil();
        $credentials = $dataAuth->config['credentials-invalid-credentials'];

        $resonse = $dataAuth->attempt($credentials);
        
    }
    
}
