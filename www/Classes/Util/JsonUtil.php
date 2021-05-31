<?php

namespace Util;

class JsonUtil{

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