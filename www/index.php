<?php

use Validator\RequestValidator;
use Util\RotasUtil;
use Util\JsonUtil;
use Util\ConstantesGenericasUtil;

include 'bootstrap.php';

try{
    $validator = new RequestValidator(RotasUtil::getRotas());
    $retorno = $validator->processarRequest();

    $jsonUtil = new JsonUtil();
    $jsonUtil->processarArray($retorno);
    
}catch(Exception $e){
    echo json_encode([
        ConstantesGenericasUtil::TIPO => ConstantesGenericasUtil::TIPO_ERRO,
        ConstantesGenericasUtil::RESPOSTA => utf8_encode($e->getMessage())
    ], JSON_THROW_ON_ERROR, 512);
    exit;
}



