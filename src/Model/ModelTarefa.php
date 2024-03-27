<?php

namespace HenriqueBS0\AgendaTarefas\Model;

use HenriqueBS0\AgendaTarefas\Estrutura\Model\ModelJson;

class ModelTarefa extends ModelJson {
    public $id;
    public $nome;
    public $descricao;
    public $dataHora;
    public $concluida;
    public $categoria;

    public function getId() {
        return $this->id;
    }
    public function getData() {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'dataHora' => $this->dataHora,
            'concluida' => $this->concluida,
            'categoria' => $this->categoria
        ];
    }

    public function setData($data) {
        $this->id        = $data['id'];
        $this->nome      = $data['nome'];
        $this->descricao = $data['descricao'];
        $this->dataHora  = $data['dataHora'];
        $this->concluida = $data['concluida'];
        $this->categoria = $data['categoria'];
    }

    public function getTypeName() {
        return 'tarefa';
    }
}