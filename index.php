<?php
use HenriqueBS0\AgendaTarefas\Router\MyRouter;

require_once(dirname(__FILE__) ."/vendor/autoload.php");
require_once(dirname(__FILE__) ."/config.php");

(new MyRouter())->resolve();