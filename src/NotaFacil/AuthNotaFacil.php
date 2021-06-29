<?php
namespace NotaFacil\Client;



use NotaFacil\Client\BaseConfig;
use GuzzleHttp\Exception\ClientException;

use NotaFacil\Client\Validators\AuthValidator;
use NotaFacil\Client\Exceptions\NotaFacilException;

/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class AuthNotaFacil extends BaseConfig
{
    protected $dataAuth;
    protected $consumerID;

    public function __construct($lang = 'pt-BR')
    {
        parent::__construct();
        $this->dataAuth = [
            'secret-key' =>'',
            'login' =>'',
            'password' => '',
            'token-bearer' => '',
            'token-expires-in' => '',
            'user' => ''
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
    public function attempt(array $credentials):AuthNotaFacil
    {

        AuthValidator::validateInputValidate($credentials);

        try {

            $this->setDataToAuth($credentials);

            $response = $this->invokeLogin();
            if ($response->getStatusCode() == 200) {
                
                $response = json_decode($response->getBody()->getContents(), true);
                $this->dataAuth['token-bearer'] = $response['data']['access_token'];
                $this->dataAuth['token-expires-in'] = $response['data']['expires_in'];
                $this->dataAuth['user'] = $response['data']['usuario'];
            }

        } catch (ClientException $th) {


            $response = \json_decode($th->getResponse()->getBody()->getContents(), true);

            $message = (isset($response['data']['message']))? $response['data']['message'] : $response['message'];
            $code = (isset($response['data']['code']))? $response['data']['code'] : $response['code'];

            throw (new NotaFacilException($message))->withStatus($code);
        }

        return $this;
    }

    /**
     *  Methood responsible for returning the data $dataAuth.
     *
     * @return Array
     */
    public function responseAuth():Array
    {
        return (array)$this->dataAuth;
    }
    public function setConsumerID($consumerID):String
    {
       $this->consumerID = $consumerID;
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
        $this->dataAuth['secret-key'] = $credentials['secret_key'];
        $this->dataAuth['login']      = $credentials['login'];
        $this->dataAuth['password']   = $credentials['password'];
    }

    /**
     * Methood responsible for calling the login endpoint.
     *
     * @return void
     */
    protected function invokeLogin()
    {
        $client = new \GuzzleHttp\Client();
        $urlLogin = $this->base_url() . $this->endpoint->login;

        return $client->post($urlLogin,
            [
                'headers' => ['Content-Type' => 'application/json', 'secret-key' => $this->dataAuth['secret-key']],

                'body' => json_encode(
                    [
                        "login" => $this->dataAuth['login'],
                        "password" => $this->dataAuth['password'],
                    ]
                )]
        );

      

    }

}
