<?php

namespace HenriqueBS0\AgendaTarefas\Model;
use HenriqueBS0\AgendaTarefas\Estrutura\Model\ModelJson;

class ModelUsuario extends ModelJson {
    public $id;
    public $nome;
    public $senha;

    public function getId() {
        return $this->id;
    }
    public function getData() {
        return [
            'id'    => $this->id,
            'nome'  => $this->nome,
            'senha' => $this->senha
        ];
    }
    public function setData($data) {
        $this->id = $data['id'];
        $this->nome = $data['nome'];
        $this->senha = $data['senha'];
    }
    public function getTypeName() {
        return 'usuario';
    }
}