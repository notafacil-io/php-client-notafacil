<?php
namespace NotaFacil\Client;


abstract class BaseConfig  
{

    public $config;
    protected $endpoint;
   

    public function __construct()
    {
        $this->loadFile();
    }



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
        return (object)$this->config['endpoint'];
    }

    private function loadFile()
    {
        $pathRoot = str_replace('src/NotaFacil', '', __DIR__);
        $fileConfig ='config.php';
        if (file_exists($pathRoot.'/config-dev.php')) {
            $fileConfig ='config-dev.php';
        }

        $this->config = include($pathRoot.'/'.$fileConfig); 
        $this->endpoint = $this->endpoint();
    }
    
}
