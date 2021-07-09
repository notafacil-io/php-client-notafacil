<?php
namespace NotaFacil\Common\Traits;


trait CommonTrait
{
    protected $config;
    protected $endpoint;

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
    public function getCredentials():Array
    {
       
        return $this->config['credentials'];
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

    /**
     * Method responsible for loading configuration data from our SDK
     *
     * @return void
     */
    private function loadFile()
    {
        $pathRoot = str_replace('src/NotaFacil/Traits', '', __DIR__);
        $fileConfig ='config.php';
        if (file_exists($pathRoot.'/config-dev.php')) {
            $fileConfig ='config-dev.php';
        }

        $this->config = include($pathRoot.'/'.$fileConfig); 
        $this->endpoint = $this->endpoint();
    }

}
