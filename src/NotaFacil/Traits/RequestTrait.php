<?php
namespace NotaFacil\Common\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use NotaFacil\Common\Resources\NotaFacilResource;
use NotaFacil\Common\Exceptions\NotaFacilException;


trait RequestTrait
{
    protected $credentialsNotaFacil;
    protected $contentBody;

    protected function getHeader(){

       

        $header[] = 'User-Agent: Mozilla/5.0';
        $header[] = 'SDK-Agent: php-sdk-notafacil';
        $header[] = 'Content-Type: application/json';

        if(!empty($this->credentialsNotaFacil['secret-key'])){
            $header[] = 'secret-key: '.$this->credentialsNotaFacil['secret-key'];
        }
        if(!empty($this->credentialsNotaFacil['consumer-id'])){
            $header[] = 'consumer-id: '.$this->credentialsNotaFacil['consumer-id'];
        }
 
        if(!empty($this->credentialsNotaFacil['token-bearer'])){
            $header[] = 'Authorization: '. $this->credentialsNotaFacil['token-bearer'];
        } 
           
        return $header;
    }


    /**
     * Methood responsible for calling the API endpoint.
     *
     * @return void
     */
    protected function request($urlRequest, $method = 'GET', $param = []): NotaFacilResource
    {
        $response  = $this->execCurl($urlRequest, $method, $param);
        return new NotaFacilResource( $this->processDataResponse($response, compact( 'urlRequest', 'method', 'param')) );

    }
    protected function execCurl($urlRequest, $method, $param): Array
    {
        @set_time_limit(300);
        ini_set('max_execution_time', 300);
        ini_set('max_input_time', 300);
        ini_set('memory_limit', '256M');

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $urlRequest,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => $method,
          CURLOPT_HTTPHEADER => $this->getHeader(),
        ));

        if(!empty($param)){
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($param));
        }
       
        $response = curl_exec($curl);
       
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        return ['response' => json_decode($response, TRUE), 'http_status' => $http_status];

    }

    public function processDataResponse($response, $paramRequest)
    {  
       
        if($response["http_status"] == 200 || $response["http_status"] == 201 || $response["http_status"] == 422){
           return $this->simplifiesAnswer($response, $paramRequest);
        }

        if($response["http_status"] == 500){
            throw (new NotaFacilException( 
                __NotaFacilCommonErros('errors.500.CONTAT_TEAM_SUPORT', [':ERROR_SERVER:' => $response['response']["message"]]) 
            ))->withCode($response["http_status"]);
        }

        throw (new NotaFacilException( 
            __NotaFacilCommonErros('errors.NOT_VALID', [':ERROR_SERVER:' => (!empty($response['response']["data"]["message"]))? $response['response']["data"]["message"] : ((!empty($response["response"]['message']))? $response["response"]['message'] : $response["response"]['mensagem'])]) 
        ))->withCode($response["http_status"]);
    }

    protected function simplifiesAnswer($response, $paramRequest)
    {
       $this->contentBody[] = $this->extractContentBodyInResponse($response);
        
       if(!empty($response['response']["meta"])){
            $this->extractPagination($response, $paramRequest);
       }

       return ['contents' => $this->extractBody(), 'statusCode' => $response["http_status"]];
    }

    protected function extractContentBodyInResponse($response)
    {
        $content = $response["response"];
        return  (!empty( $content['data'] ))?  $content['data'] :  ((!empty($content['message']))? $content['message'] : ((!empty($content['nfs_totais']))? $content['nfs_totais'] :$content['mensagem']));
    }

    protected function extractPagination($response, $paramRequest)
    { 
        $currentPage = $response['response']["meta"]["current_page"];
        $lastPage = $response['response']["meta"]["last_page"];
        if ($lastPage > 1 && $currentPage < $lastPage) {
             preg_match('/\?(.*)/i', str_replace('?page='.($currentPage).'&', '?', $paramRequest["urlRequest"]), $dataUrl);
             $data = (!empty($dataUrl[1]) && !preg_match('/page=/', $dataUrl[1]))? $dataUrl[1] : '';
             $baseUrl = $response['response']["meta"]["path"].'?page='.($currentPage + 1).(!empty($data)? '&'.$data : '');
             
             $this->request($baseUrl,  $paramRequest["method"],  $paramRequest["param"]);
        }
    }
    protected function extractBody()
    { 
       
        if (count($this->contentBody) < 2) {
            return (!empty($this->contentBody[0]))? $this->contentBody[0] : [];
        }
        $newBody = [];
        for ($i=0; $i < count($this->contentBody); $i++) { 
            for ($j=0; $j < count($this->contentBody[$i]); $j++) { 
                $newBody[] = $this->contentBody[$i][$j];
            }
        }
       
        return $newBody;
    }
}
