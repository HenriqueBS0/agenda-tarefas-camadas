<?php

namespace HenriqueBS0\AgendaTarefas\Model;
use HenriqueBS0\AgendaTarefas\Estrutura\Model\ModelJson;

class ModelCategoria extends ModelJson {
    public $id;
    public $nome;
    public $usuario;

    public function getId() {
        return $this->id;
    }

    public function getData() {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'usuario' => $this->usuario
        ];
    }

    public function setData($data) {
        $this->id = $data['id'];
        $this->nome = $data['nome'];
        $this->usuario = $data['usuario'];
    }

    public function getTypeName() {
        return 'categoria';
    }
}