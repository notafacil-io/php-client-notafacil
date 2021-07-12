<?php
namespace NotaFacil\Common\Test;

use PHPUnit\Framework\TestCase;
use NotaFacil\Common\Services\AuthNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

class AuthNotaFacilTest extends TestCase
{
    /**
    * @test
    */
    public function shouldAttemptLoginWhithCredentialsWithValid()
    {

        $clientNotaFacil = new AuthNotaFacil();
        $credentials = $clientNotaFacil->getCredentials();

        $dataAuth = $clientNotaFacil->attempt($credentials['valid'])->getDataAuth();
                                                // ->getResponse();
        $this->assertTrue(($clientNotaFacil instanceof AuthNotaFacil && !empty($dataAuth['token-bearer'])));
    }

   /**
    * @test
    */
    public function shouldThrowExceptionWhenAttemptLoginWhithIvalidSecretKey()
    {
        $this->expectException(NotaFacilException::class);

        $clientNotaFacil = new AuthNotaFacil();
        $credentials = $clientNotaFacil->getCredentials();

        $resonse = $clientNotaFacil->attempt($credentials['invalid-softhouse']);
        
    }
    
   /**
    * @test
    */
    public function shouldThrowExceptionWhenAttemptLoginWhithIvalidCredentials() 
    {
        $this->expectException(NotaFacilException::class);

        $clientNotaFacil = new AuthNotaFacil();
        $credentials = $clientNotaFacil->getCredentials();

        $resonse = $clientNotaFacil->attempt($credentials['invalid-credentials']);
        
    }
    
}
