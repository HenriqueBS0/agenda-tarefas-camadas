<?php

namespace HenriqueBS0\AgendaTarefas\Router\Middleware;

use Exception;
use HenriqueBS0\AgendaTarefas\Bo\BoSession;
use HenriqueBS0\AgendaTarefas\Estrutura\Router\IMiddleware;

class Auth implements IMiddleware {
    public function resolve() : void
    {
        if(BoSession::get('logado') !== true) {
            throw new Exception('Usuário não autorizado');
        }
    }
}