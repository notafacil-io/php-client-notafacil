<?php
namespace NotaFacil\Common\Test;

use PHPUnit\Framework\TestCase;
use NotaFacil\Common\ClientNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

class ClientNotaFacilTest extends TestCase
{
    /**
    * @test
    */
    public function shouldAttemptLoginWhithCredentialsWithValid()
    {

        $clientNotaFacil = new ClientNotaFacil();
        $credentials = $clientNotaFacil->getCredentials();

        $dataAuth = $clientNotaFacil->attempt($credentials['valid'])->getDataAuth();
                                                // ->getResponse();
        $this->assertTrue(($clientNotaFacil instanceof ClientNotaFacil && !empty($dataAuth['token-bearer'])));
    }

   /**
    * @test
    */
    public function shouldThrowExceptionWhenAttemptLoginWhithIvalidSecretKey()
    {
        $this->expectException(NotaFacilException::class);

        $clientNotaFacil = new ClientNotaFacil();
        $credentials = $clientNotaFacil->getCredentials();

        $resonse = $clientNotaFacil->attempt($credentials['invalid-softhouse']);
        
    }
    
   /**
    * @test
    */
    public function shouldThrowExceptionWhenAttemptLoginWhithIvalidCredentials() 
    {
        $this->expectException(NotaFacilException::class);

        $clientNotaFacil = new ClientNotaFacil();
        $credentials = $clientNotaFacil->getCredentials();

        $resonse = $clientNotaFacil->attempt($credentials['invalid-credentials']);
        
    }
    
}
