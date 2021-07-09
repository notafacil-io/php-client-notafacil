<?php
namespace NotaFacil\Common\Validators;

use NotaFacil\Common\Exceptions\NotaFacilException;

/**
 * Class responsible for validate input data for authenticat
 */
class AuthValidator
{
 
    /**
     * Methood responsible for validate cridentials input.
     * struct param 
     * - $credentials = [login' => string,'password' => string,'secret_key' => string]
     *
     * @param array $credentials
     *
     * @return void
     */
    public static function validateInputValidate(array $credentials)
    {
       self::validateKeysInput($credentials);
        foreach ($credentials as $key => $value) {
            if(empty($value)) {
                throw (new NotaFacilException( 'O valor da chave '.$key.' não pode ser nula' ))->withCode(400);
            }
        }
        
    }

    /**
     * Methood responsible for validate the keys cridentials input.
     * keys for validate 
     * - [login', 'password', 'secret_key']
     *
     * @param array $credentials
     *
     * @return void
     */
    public static function validateKeysInput(array $credentials)
    {
        $credentialsKey = ['login', 'password', 'secret_key'];
        foreach ($credentialsKey as $key) {
            if(!array_key_exists($key, $credentials)){
                throw (new NotaFacilException( 'A chave '.$key.' é obrigatória ser informada' ))->withCode(400);
            }
        }
    }
}
