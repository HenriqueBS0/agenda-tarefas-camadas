<?php

namespace HenriqueBS0\AgendaTarefas\View;
use HenriqueBS0\AgendaTarefas\Estrutura\View\ViewHtml;
use HenriqueBS0\AgendaTarefas\Model\ModelTarefa;

class ViewTarefas extends ViewHtml {
    public function render($data = [])
    {
        $tarefas = array_map(function(ModelTarefa $modelTarefa) {
            return self::getHtmlAndReplaceData('tarefa', [
                'id' => $modelTarefa->id,
                'nome' => $modelTarefa->nome,
                'descricao' => $modelTarefa->descricao,
                'data-hora' => $modelTarefa->dataHora,
                'concluida' => $modelTarefa->concluida ? 'Sim' : 'Não',
                'categoria' => $modelTarefa->categoria
            ]);
        }, $data['tarefas']);

        echo (new ViewBase())->render([
            'conteudo' => self::getHtmlAndReplaceData('tarefas', [
                'categoria' => $data['categoria'],
                'tarefas'   => implode(PHP_EOL, $tarefas)
            ])
        ]);
    }
}