<?php
namespace NotaFacil\Common\Services;

use GuzzleHttp\Exception\ClientException;

use NotaFacil\Common\Traits\RequestTrait;
use NotaFacil\Common\Services\BaseService;
use NotaFacil\Common\Validators\AuthValidator;
use NotaFacil\Common\Exceptions\NotaFacilException;

/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class AuthNotaFacil extends BaseService
{
    use RequestTrait;
    protected $dataAuth;
    protected $dataResponse;
    protected $credentials;

    public function __construct()
    {
        parent::__construct();

        $this->dataAuth = [
            'consumer-id' => '',
            'token-bearer' => '',
            'token-expires-in' => '',
        ];

    }

    /**
     * Methood responsible for the authentication attempt in the Nota Fácil API.
     * struct param
     * - $credentials = [login' => string,'password' => string,'secret_key' => string]
     *
     * @param array $credentials
     *
     * @return AuthNotaFacil
     */
    public function attempt(array $credentials): AuthNotaFacil
    {

       
        AuthValidator::validateInputValidate($credentials);

        $this->setDataToAuth($credentials);

        $this->dataResponse = ($this->request( $this->base_url() . $this->endpoint->auth->login, 'POST',  $this->credentials))->getContent();
        
        $this->dataAuth['token-bearer'] = $this->dataResponse["token_type"] .' '. $this->dataResponse['access_token'];
        $this->dataAuth['token-expires-in'] = $this->dataResponse['expires_in'];

        return $this;
    }

    /**
     *  Methood responsible for returning the data $dataAuth.
     *
     * @return Array
     */
    public function getResponse(): array
    {
        return (array)$this->dataResponse;
    }
    /**
     *  Methood responsible for returning the data $dataAuth.
     *
     * @return Array
     */
    public function getDataAuth(): array
    {
        return (array)$this->dataAuth;
    }

    /**
     *  Methood responsible for defining the data for the $consumerID parameter.
     *
     * @param [type] $consumerID
     * @return String
     */
    public function setConsumerID($consumerID)
    {
        $this->dataAuth['consumer-id'] = $consumerID;
    }
    /**
     *  Methood responsible for return the data $consumerID.
     *
     * @param [type] $consumerID
     * @return String
     */
    public function getConsumerID(): String
    {
        return (!empty($this->dataAuth['consumer-id'])) ? $this->dataAuth['consumer-id'] : '';
    }

    /**
     * Methood responsible for defining the data for the $dataAuth parameter.
     *
     * @param array $credentials
     *
     * @return void
     */
    protected function setDataToAuth(array $credentials)
    {
    
        $this->credentialsNotaFacil['secret-key'] = $credentials['secret_key'];
        $this->credentials['login'] = $credentials['login'];
        $this->credentials['password'] = $credentials['password'];
    }

    

}
