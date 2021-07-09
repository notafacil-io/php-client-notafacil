<?php
namespace NotaFacil\Common\Services;

use NotaFacil\Common\Traits\CommonTrait;

abstract class BaseService  
{
    use CommonTrait;

    public function __construct()
    {
        $this->loadFile();
    }

}
