<?php

namespace Repository;

use DB\MySQL;

class UsuariosRepository{

    private object $MySQL;
    public const TABELA = "Usuarios";

    public function __construct(){
        $this->MySQL = new MySQL();
    }

    public function insertUser($login, $senha){
        $sql = 'INSERT INTO ' . self::TABELA . '(login, senha) VALUES (:login, :senha)';
        $this->MySQL->getDb()->beginTransaction();
        $stmt = $this->MySQL->getDb()->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getMySQL(){
        return $this->MySQL;
    }
}