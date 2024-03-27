<?php

namespace HenriqueBS0\AgendaTarefas\Controller;
use HenriqueBS0\AgendaTarefas\View\ViewHome;

class ControllerHome {
    public static function home() {        
        (new ViewHome())->render([]);
    }
}