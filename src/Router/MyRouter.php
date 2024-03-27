<?php

namespace HenriqueBS0\AgendaTarefas\Router;

use HenriqueBS0\AgendaTarefas\Controller\ControllerCategoria;
use HenriqueBS0\AgendaTarefas\Controller\ControllerHome;
use HenriqueBS0\AgendaTarefas\Controller\ControllerTarefa;
use HenriqueBS0\AgendaTarefas\Controller\ControllerUsuario;
use HenriqueBS0\AgendaTarefas\Estrutura\Router\Router;
use HenriqueBS0\AgendaTarefas\Router\Middleware\Auth;

class MyRouter extends Router {
    public function __construct() {
        $middlewareAuth = new Auth();

        $this->addRoute('GET',    '/',          [ControllerHome::class,      'home']);
        $this->addRoute('GET',    'cadastro',   [ControllerUsuario::class,   'cadastro']);
        $this->addRoute('POST',   'cadastrar',  [ControllerUsuario::class,   'cadastrar']);
        $this->addRoute('GET',    'login',      [ControllerUsuario::class,   'login']);
        $this->addRoute('POST',   'logar',      [ControllerUsuario::class,   'logar']);
        $this->addRoute('GET',    'categorias', [ControllerCategoria::class, 'listar'], [$middlewareAuth]);
        $this->addRoute('POST',   'categorias', [ControllerCategoria::class, 'incluir'], [$middlewareAuth]);
        $this->addRoute('DELETE', 'categorias', [ControllerCategoria::class, 'excluir'], [$middlewareAuth]);
        $this->addRoute('GET',    'tarefas',    [ControllerTarefa::class,    'listar'], [$middlewareAuth]);
        $this->addRoute('POST',   'tarefas',    [ControllerTarefa::class,    'incluir'], [$middlewareAuth]);
        $this->addRoute('DELETE', 'tarefas',    [ControllerTarefa::class,    'excluir'], [$middlewareAuth]);
        $this->addRoute('PUT',    'tarefas',    [ControllerTarefa::class,    'concluir'], [$middlewareAuth]);
    }
}