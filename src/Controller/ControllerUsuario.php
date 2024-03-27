<?php

namespace HenriqueBS0\AgendaTarefas\Controller;

use HenriqueBS0\AgendaTarefas\Bo\BoUsuario;
use HenriqueBS0\AgendaTarefas\Estrutura\View\ViewHtml;
use HenriqueBS0\AgendaTarefas\View\ViewCadastroLogin;

class ControllerUsuario {
    static public function cadastro() {
        (new ViewCadastroLogin())->render([
            'legend' => 'Cadastro',
            'action' => 'cadastrar',
        ]);
    }
    static public function cadastrar() {
        $nome = $_REQUEST['nome'];
        $senha = $_REQUEST['senha'];

        BoUsuario::cadastrar($nome, $senha);

        ViewHtml::redirect('login');
    }

    static public function login() {

        $erroLogin = isset($_REQUEST['erro-login']);

        $data = [
            'legend' => 'Login',
            'action' => 'logar',
        ];

        if($erroLogin) {
            $data['mensagem'] = 'Credenciais Inválidas';
        }

        (new ViewCadastroLogin())->render($data);
    }
    static public function logar() {
        $nome = $_REQUEST['nome'];
        $senha = $_REQUEST['senha'];

        if(BoUsuario::logar($nome, $senha)) {
            ViewHtml::redirect('categorias');
        }
        else {
            ViewHtml::redirect('login', ['erro-login' => true]);
        }
    }
}