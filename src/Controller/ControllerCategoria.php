<?php

namespace HenriqueBS0\AgendaTarefas\Controller;

use HenriqueBS0\AgendaTarefas\Bo\BoCategoria;
use HenriqueBS0\AgendaTarefas\Bo\BoSession;
use HenriqueBS0\AgendaTarefas\Estrutura\View\ViewHtml;
use HenriqueBS0\AgendaTarefas\View\ViewCategorias;

class ControllerCategoria {
    public static function listar() {
        $categorias = BoCategoria::getCategoriasUsuario(BoSession::get('usuarioId'));
        (new ViewCategorias())->render(['categorias' => $categorias]);
    }
    public static function incluir() {
        BoCategoria::incluir(BoSession::get('usuarioId'), $_REQUEST['nome']);
        ViewHtml::redirect('categorias');
    }

    public static function excluir() {
        BoCategoria::excluir($_REQUEST['id']);
        ViewHtml::redirect('categorias');
    }
}