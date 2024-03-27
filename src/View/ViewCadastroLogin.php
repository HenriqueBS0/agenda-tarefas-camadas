<?php

namespace HenriqueBS0\AgendaTarefas\View;

use HenriqueBS0\AgendaTarefas\Estrutura\View\ViewHtml;

class ViewCadastroLogin extends ViewHtml {
    public function render($data = []) {

        $data['mensagem'] = $data['mensagem'] 
            ? "<span>{$data['mensagem']}</span>"
            : '';

        echo (new ViewBase())
            ->render([
                'conteudo' => self::getHtmlAndReplaceData('cadastro-login', $data)
            ]);
    }
}