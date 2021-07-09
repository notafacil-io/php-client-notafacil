<?php
namespace NotaFacil\Common\Resources;

class NotaFacilResource
{
    protected $response;
    public function __construct(Array $response)
    {
        $this->response = $response;
    }

    public function getResponse(): Array
    {
        return $this->response;
    }

    public function getContent(): Array
    {
        return is_array($this->response['contents']) ? $this->response['contents'] : ['message' => $this->response['contents']];
    }

    public function getStatusCode(): Int
    {
        return (int)$this->response['statusCode'];
    }


}
