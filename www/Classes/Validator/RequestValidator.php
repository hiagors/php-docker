<?php

namespace Validator;

use Util\ConstantesGenericasUtil;
use Util\JsonUtil;
use Repository\TokensAutorizadosRepository;
use Service\UsuariosService;

class RequestValidator{

    private $request;
    private array $dadosRequest = [];
    private object $TokensAutorizadosRepository;


    const GET = 'GET';
    const DELETE = 'DELETE';
    const USUARIOS = 'USUARIOS';

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
        }
        $this->TokensAutorizadosRepository->validarToken(getallheaders()['Authorization']);
        $metodo = $this->request['metodo'];
        return $this->$metodo();
    }

    private function get(){
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        
        if(in_array($this->request['rota'],  ConstantesGenericasUtil::TIPO_GET, 'strict')){
            switch($this->request['rota']){
                case self::USUARIOS: 
                    $usuariosService = new UsuariosService($this->request);
                    $retorno = $usuariosService->validarGet();
                break;
                default:
                    throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
            }
        }
        return $retorno;
    }
}