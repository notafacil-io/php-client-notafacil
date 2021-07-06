<?php
namespace NotaFacil\Client;

use NotaFacil\Client\ClientNotaFacil;
use NotaFacil\Client\Exceptions\NotaFacilException;

/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class SofthouseService
{

    public $clientNotaFacil;

    public function __construct(ClientNotaFacil $clientNotaFacil)
    {
        $this->clientNotaFacil = $clientNotaFacil;
    }

    public function showData(): array
    {

        try {

            $urlRequest = $this->clientNotaFacil->base_url() . $this->clientNotaFacil->endpoint->softhouse->logada;
            $response = $this->invokeRequest($urlRequest);

            if ($response->getStatusCode() == 200) {

                $response = json_decode($response->getBody()->getContents(), true);
                return $response['data'];
            }
        } catch (ClientException $th) {

            $response = \json_decode($th->getResponse()->getBody()->getContents(), true);
            $message = (isset($response['data']['message'])) ? $response['data']['message'] : $response['message'];
            $code = (isset($response['data']['code'])) ? $response['data']['code'] : $response['code'];

            throw (new NotaFacilException($message))->withStatus($code);
        }

        return [];

    }

    /**
     * Methood responsible for calling the login endpoint.
     *
     * @return void
     */
    protected function invokeRequest($urlRequest, $method = 'GET', $param = [])
    {
        $client = new \GuzzleHttp\Client();

        $dataParam = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->clientNotaFacil->dataAuth['token-bearer'],
            ],
            'body' => json_encode($param),
        ];
        return $client->request($method, $urlRequest, $dataParam);

    }

}
