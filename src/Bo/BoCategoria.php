<?php

namespace HenriqueBS0\AgendaTarefas\Bo;

use HenriqueBS0\AgendaTarefas\Estrutura\Model\DataServiceJson;
use HenriqueBS0\AgendaTarefas\Model\ModelCategoria;
use HenriqueBS0\AgendaTarefas\Model\ModelTarefa;

class BoCategoria {
    public static function getCategoriasUsuario($iUsuario) : array
    {
        $oCategoria = new ModelCategoria();

        $categorias = [];

        /** @var ModelCategoria $oCategoriaItem */
        foreach (DataServiceJson::getAll($oCategoria) as $oCategoriaItem) {
            if($oCategoriaItem->usuario == $iUsuario) {
                $categorias[] = $oCategoriaItem;
            }
        }

        return $categorias;
    }

    public static function incluir($usuario, $nome) {
        $categoria = new ModelCategoria();
        $categoria->id = uniqid();
        $categoria->nome = $nome;
        $categoria->usuario = $usuario;

        DataServiceJson::add($categoria);
    }

    public static function excluir($id) {
        $categoria = new ModelCategoria();
        $categoria->id = $id;
        DataServiceJson::remove($categoria);
    }

    public static function getNumeroTarefasConcluida($id)
    {
        return count(array_filter(
            BoTarefas::getTarefasCategoria($id),
            function(ModelTarefa $modelTarefa) {
                return $modelTarefa->concluida;
            }
        ));
    }
}