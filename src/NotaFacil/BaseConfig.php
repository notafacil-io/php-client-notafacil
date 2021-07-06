<?php
namespace NotaFacil\Client;

use NotaFacil\Client\Traits\CommonTrait;

abstract class BaseConfig  
{
    use CommonTrait;

    public $config;

    public $endpoint;
   

    public function __construct()
    {
        $this->loadFile();
    }

    /**
     * Method responsible for loading configuration data from our SDK
     *
     * @return void
     */
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
