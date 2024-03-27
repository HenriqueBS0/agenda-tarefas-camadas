<?php

namespace HenriqueBS0\AgendaTarefas\View;
use HenriqueBS0\AgendaTarefas\Estrutura\View\ViewHtml;

class ViewHome extends ViewHtml {
    public function render($data = [])
    {
        echo (new ViewBase())->render([
            'conteudo' => self::getHtmlAndReplaceData('home', $data)]
        );
    }
}