<?php

use DB\MySQL;

namespace Repository;

class TokensAutorizadosRepository{
    private object $MySQL;
    public const tabela = "Tokens_autorizados";

    public function __construct(){
        $this->MySQL = new MySQL();
    }

    public function validarToken($token){}


    public function getMySQL(){
        return $this->MySQL;
    }
}