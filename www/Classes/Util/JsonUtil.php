<?php

namespace Util;

use Util\ConstantesGenericasUtil;

class JsonUtil{

    public function processarArray($retorno){
        $dados = [];
        $dados[ConstantesGenericasUtil::TIPO] = ConstantesGenericasUtil::TIPO_ERRO;

        if((is_array($dados) && count($retorno) > 0) || strlen($retorno) > 10){
            
        }
    }

    public static function tratarCorpoRequisicaoJson(){
        try{
            $postJson = json_decode(file_get_contents('php://input'), true);
        }catch(JsonException $e){
            throw new InvalidArgumentException('O Corpo da requisição não pode ser vazio!');
        }

        if(is_array($postJson) && count($postJson) > 0){
            return $postJson;
        }
    }
}