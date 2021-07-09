<?php
namespace NotaFacil\Common\Services;

use GuzzleHttp\Exception\ClientException;

use NotaFacil\Common\Services\BaseService;
use NotaFacil\Common\Validators\AuthValidator;
use NotaFacil\Common\Exceptions\NotaFacilException;

/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class AuthNotaFacil extends BaseService
{
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

        $this->dataResponse = $this->invokeLogin();

        $this->dataAuth['token-bearer'] = 'Bearer ' . $this->dataResponse['data']['access_token'];
        $this->dataAuth['token-expires-in'] = $this->dataResponse['data']['expires_in'];

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
        $this->credentials['secret-key'] = $credentials['secret_key'];
        $this->credentials['login'] = $credentials['login'];
        $this->credentials['password'] = $credentials['password'];
    }

    /**
     * Methood responsible for calling the login endpoint.
     *
     * @return void
     */
    protected function invokeLogin()
    {
        
        try {
            $client = new \GuzzleHttp\Client();
            $urlLogin = $this->base_url() . $this->endpoint->auth->login;
            
            $response = $client->post($urlLogin,
                [
                    'headers' => ['Content-Type' => 'application/json', 'secret-key' => $this->credentials['secret-key']],

                    'body' => json_encode(
                        [
                            "login" => $this->credentials['login'],
                            "password" => $this->credentials['password'],
                        ]
                    )]
            );

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents(), true);
            }

        } catch (ClientException $th) {

            $response = \json_decode($th->getResponse()->getBody()->getContents(), true);

            $message = (isset($response['data']['message'])) ? $response['data']['message'] : $response['message'];
            $code = (isset($response['data']['code'])) ? $response['data']['code'] : $response['code'];

            throw (new NotaFacilException($message))->withCode($code);
        }

    }

}
