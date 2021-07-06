<?php
namespace NotaFacil\Client\Traits;


trait CommonTrait
{

    /**
     * Methood responsible for returning the base of the URL for communication with the Nota Facil API
     *
     * @return String
     */
    public function base_url():String
    {
        return $this->config['base_url'];
    }
    /**
     *  Methood responsible for returning the endpoint of the URL for communication with the Nota Facil API
     *
     * @return void
     */
    public function endpoint():Object
    {
        return $this->convertObject($this->config['endpoint']);
    }
    /**
     *  Method responsible for converting an array into StdClass
     *
     * @param [type] $array
     * @return Object
     */
    public function convertObject($array):Object
    {
        return json_decode( json_encode($array) );
    }

}
