<?php

namespace Repository;

use DB\MySQL;
use Util\ConstantesGenericasUtil;
use InvalidArgumentException;

class TokensAutorizadosRepository{
    private object $MySQL;
    public const TABELA = "Tokens_autorizados";

    public function __construct(){

        $this->MySQL = new MySQL();

    }

    public function validarToken($token){
        $token = str_replace([' ', 'Bearer'], '', $token);
        
        if($token){
            $sql = 'SELECT id FROM ' . self::TABELA . ' WHERE token = :token AND status = :status';
            $stmt = $this->getMySQL()->getDb()->prepare($sql);
            $stmt->bindValue(':token', $token);
            $stmt->bindValue(':status', 'S');
            $stmt->execute();
            if($stmt->rowCount() !== 1){
                header('HTTP/1.0 401 Unauthorized', true, 401);        
                throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_TOKEN_NAO_AUTORIZADO);
            }
        } else{
            header('HTTP/1.0 404 NOT FOUND', true, 404); 
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_TOKEN_VAZIO);
        }
    }


    public function getMySQL(){
        return $this->MySQL;
    }
}