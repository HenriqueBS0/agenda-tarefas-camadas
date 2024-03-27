<?php

namespace HenriqueBS0\AgendaTarefas\Controller;

use HenriqueBS0\AgendaTarefas\Bo\BoTarefas;
use HenriqueBS0\AgendaTarefas\Estrutura\View\ViewHtml;
use HenriqueBS0\AgendaTarefas\View\ViewTarefas;

class ControllerTarefa {
    public static function listar() {
        $tarefas = BoTarefas::getTarefasCategoria($_REQUEST['id']);
        (new ViewTarefas())->render(['tarefas' => $tarefas, 'categoria' => $_REQUEST['id']]);
    }
    public static function incluir() {
        BoTarefas::incluir(
            $_REQUEST['nome'],
            $_REQUEST['descricao'],
            $_REQUEST['data-hora'],
            $_REQUEST['categoria']
        );

        ViewHtml::redirect('tarefas', ['id' => $_REQUEST['categoria']]);
    }

    public static function excluir() {
        BoTarefas::remover($_REQUEST['id']);
        ViewHtml::redirect('tarefas', ['id' => $_REQUEST['categoria']]);
    }

    public static function concluir() {
        BoTarefas::concluir($_REQUEST['id']);
        ViewHtml::redirect('tarefas', ['id' => $_REQUEST['categoria']]);
    }
}