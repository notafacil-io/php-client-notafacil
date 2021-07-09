<?php
namespace NotaFacil\Common\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use NotaFacil\Common\Resources\NotaFacilResource;
use NotaFacil\Common\Exceptions\NotaFacilException;


trait RequestTrait
{
    protected $credentialsNotaFacil;

    protected function getHeader(){

        if(!empty($this->credentialsNotaFacil['consumer-id'])){
            $header['consumer-id'] = $this->credentialsNotaFacil['consumer-id'];
        }

        $header['Content-Type'] = 'application/json';
        $header['Authorization'] = preg_match('/Bearer /',  $this->credentialsNotaFacil['token-bearer'])? $this->credentialsNotaFacil['token-bearer']: 'Bearer '. $this->credentialsNotaFacil;
       
        return $header;
    }


    /**
     * Methood responsible for calling the API endpoint.
     *
     * @return void
     */
    protected function request($urlRequest, $method = 'GET', $param = []): NotaFacilResource
    {
        try {
            $client = new Client();

            $dataParam['headers'] = $this->getHeader();
            $dataParam['body'] = json_encode($param);

            $response = $client->request($method, $urlRequest, array_filter($dataParam));
            

            return new NotaFacilResource([
                'statusCode' => $response->getStatusCode(), 
                'contents' => $this->loadContent($response)
            ]);
            
        } catch (ClientException $th) {

            $response = \json_decode($th->getResponse()->getBody()->getContents(), true);
            $message = (isset($response['data']['message'])) ? $response['data']['message'] : ((!empty($response['message']))? $response['message'] : $th->getMessage());
            $code = (isset($response['data']['code'])) ? $response['data']['code'] : ((!empty($response['code']))? $response['code']: $th->getCode());

            throw (new NotaFacilException($message))->withCode($code);
        }

    }

    public function loadContent($response)
    {   
        $content = json_decode($response->getBody()->getContents(), true);
        $contentResponse = (!empty($content['data']))? $content['data'] : $content["mensagem"];

        if(!empty($content["meta"]) && $content["meta"]["last_page"] > 1){
            $contentResponse[] = [
                'observacao' => 'Refine melhor sus pesquisa temos mais '.($content["meta"]["total"] - $content["meta"]["per_page"]).'. Possives resultados'
            ];
        }
        return $contentResponse;
    }

}
