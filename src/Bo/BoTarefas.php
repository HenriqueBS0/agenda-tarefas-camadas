<?php

namespace HenriqueBS0\AgendaTarefas\Bo;

use HenriqueBS0\AgendaTarefas\Estrutura\Model\DataServiceJson;
use HenriqueBS0\AgendaTarefas\Model\ModelTarefa;

class BoTarefas {
    public static function getTarefasCategoria($idCategoria) {
        return array_filter(
            DataServiceJson::getAll(new ModelTarefa),
            function(ModelTarefa $tarefa) use ($idCategoria) {
                return $tarefa->categoria == $idCategoria;
            }
        );
    }
    public static function incluir($nome, $descricao, $dataHora, $categoria) {
        $tarefa = new ModelTarefa();
        $tarefa->id = uniqid();
        $tarefa->nome = $nome;
        $tarefa->descricao = $descricao;
        $tarefa->dataHora = $dataHora;
        $tarefa->categoria = $categoria;
        $tarefa->concluida = false;

        DataServiceJson::add($tarefa);
    }

    public static function remover($id) {
        $tarefa = new ModelTarefa;
        $tarefa->id = $id;
        DataServiceJson::remove($tarefa);
    }
    
    public static function concluir($id) {
        $tarefa = new ModelTarefa;
        $tarefa->id = $id;
        $tarefa = DataServiceJson::get($tarefa);
        $tarefa->concluida = true;
        DataServiceJson::set($tarefa);
    }

}