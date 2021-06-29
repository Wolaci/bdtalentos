<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Vaga{

    public $id;
    public $titulo;
    public $descricao;
    public $ativo;
    public $data;

    public static function getVagas($where=null, $order=null, $limit = null){
        return (new Database('vagas'))->select($where, $order, $limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public function cadastrar(){
        $this->data = date('Y-m-d H:i:s');
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
                                            'titulo' => $this->titulo,
                                            'descricao' => $this->descricao,
                                            'ativo' => $this->ativo,
                                            'data' => $this->data
                                        ]);
        return true;                             
    }

}