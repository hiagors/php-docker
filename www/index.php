<?php

use Validator\RequestValidator;
use Util\RotasUtil;

include 'bootstrap.php';

try{
    $validator = new RequestValidator(RotasUtil::getRotas());
    $retorno = $validator->processarRequest();
    
}catch(Exception $e){
    echo $e->getMessage();
}



