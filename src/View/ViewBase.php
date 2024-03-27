<?php

namespace HenriqueBS0\AgendaTarefas\View;
use HenriqueBS0\AgendaTarefas\Estrutura\View\ViewHtml;

class ViewBase extends ViewHtml {
    public function render($data = []) 
    {
        return self::getHtmlAndReplaceData('base', $data);
    }
}