<?php

namespace HenriqueBS0\AgendaTarefas\Bo;

use HenriqueBS0\AgendaTarefas\Estrutura\Model\DataServiceJson;
use HenriqueBS0\AgendaTarefas\Model\ModelUsuario;

class BoUsuario {
    public static function cadastrar($nome, $senha) 
    {
        $oUsuario = new ModelUsuario();
        $oUsuario->id = uniqid();
        $oUsuario->nome = $nome;
        $oUsuario->senha = $senha;

        DataServiceJson::add($oUsuario);
    }

    public static function logar($nome, $senha) : bool
    {
        $oUsuario = new ModelUsuario();
        $aUsuarios = DataServiceJson::getAll($oUsuario);

        foreach ($aUsuarios as $oUsuarioItem) {
            if(
                strtoupper($oUsuarioItem->nome) == strtoupper($nome) && 
                $oUsuarioItem->senha === $senha
            ) {
                BoSession::set('logado', true);
                BoSession::set('usuarioId', $oUsuarioItem->id);
                return true;
            }
        }

        return false;
    }
}