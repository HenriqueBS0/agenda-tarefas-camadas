<?php

namespace HenriqueBS0\AgendaTarefas\View;

use HenriqueBS0\AgendaTarefas\Bo\BoCategoria;
use HenriqueBS0\AgendaTarefas\Estrutura\View\ViewHtml;
use HenriqueBS0\AgendaTarefas\Model\ModelCategoria;

class ViewCategorias extends ViewHtml {
    public function render($data = []) {
        $categorias = array_map(function(ModelCategoria $modelCategoria) {
            return self::getHtmlAndReplaceData('categoria', [
                'id' => $modelCategoria->id,
                'nome' => $modelCategoria->nome,
                'tarefas-concluidas' => BoCategoria::getNumeroTarefasConcluida($modelCategoria->id)
            ]);
        }, $data['categorias']);

        echo (new ViewBase())->render([
            'conteudo' => self::getHtmlAndReplaceData('categorias', [
                    'categorias' => implode(PHP_EOL, $categorias)
                ])
            ]);
    }
}