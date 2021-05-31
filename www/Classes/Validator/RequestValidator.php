<?php

namespace Validator;

use Util\ConstantesGenericasUtil;
use Util\JsonUtil;
use Repository\TokensAutorizadosRepository;

class RequestValidator{

    private $request;
    private array $dadosRequest = [];
    private object $TokensAutorizadosRepository;

    const GET = 'GET';
    const DELETE = 'DELETE';

    public function __construct($request){
        $this->request = $request;
        $this->TokensAutorizadosRepository = new TokensAutorizadosRepository();
    }

    public function processarRequest(){
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        if(in_array($this->request['metodo'],ConstantesGenericasUtil::TIPO_REQUEST, true)){
           $retorno = $this->direcionarRequest();
        }
        return $retorno;
    }

    private function direcionarRequest(){
        if($this->request['metodo'] !== self::GET && $this->request['metodo'] !== self::DELETE){
            $this->dadosRequest = JsonUtil::tratarCorpoRequisicaoJson();
            echo(json_encode($this->dadosRequest));
        }
    }
}