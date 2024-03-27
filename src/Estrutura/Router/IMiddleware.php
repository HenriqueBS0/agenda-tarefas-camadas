<?php

namespace HenriqueBS0\AgendaTarefas\Estrutura\Router;

use Throwable;

interface IMiddleware {

    /**
     * @throws Throwable
     */
    public function resolve() : void;
}