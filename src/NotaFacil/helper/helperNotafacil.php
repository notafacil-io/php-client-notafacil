<?php

if (!function_exists('__NotaFacilCommonErros')) {
    function __NotaFacilCommonErros($indexString, $replace = [])
    {
        $pathRoot = str_replace('helper', 'lang', __DIR__);  
        $fileLang ='pt-br.php';
        $lang = include($pathRoot.'/'.$fileLang); 
        
        foreach ($replace as $key => $value) {
            $lang[$indexString] = str_replace($key, $value, $lang[$indexString]);
        }

        return $lang[$indexString];
    }
}