<?php

use Validator\RequestValidator;
use Util\RotasUtil;
use Util\JsonUtil;

include 'bootstrap.php';

try{
    $validator = new RequestValidator(RotasUtil::getRotas());
    $retorno = $validator->processarRequest();

    $jsonUtil = new JsonUtil();
    $jsonUtil->
    echo(json_encode($retorno));
    
}catch(Exception $e){
    echo(json_encode($e->getMessage()));
}



