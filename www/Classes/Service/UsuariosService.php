<?php

namespace Service;

use Repository\UsuariosRepository;
use Util\ConstantesGenericasUtil;

class UsuariosService{

    public const TABELA = 'Usuarios';
    public const RECURSOS_GET = ['listar'];

    private array $dados;
    private object $usuariosRespository;

    public function __construct($dados = []){
        $this->dados = $dados;
        $this->usuariosRepository = new UsuariosRepository();
    }

    public function validarGet(){
        $retorno = null;
        $recurso = $this->dados['recurso'];
        if(in_array($recurso, self::RECURSOS_GET, 'strict')){
            $retorno = $this->dados['id'] > 0 ? $this->getById() : $this->$recurso();
        } else {
            throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
        }

        if($retorno == null){
            throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_GENERICO);
        }
        
        return $retorno;        
    }

    private function getById(){

    }

    private function listar(){

        return $this->usuariosRepository->getMySQL()->getAll(self::TABELA);
    }
}