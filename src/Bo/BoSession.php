<?php

namespace HenriqueBS0\AgendaTarefas\Bo;

class BoSession {
    public static function set(string $key, mixed $dado) : void
    {
        session_start();
        $_SESSION[$key] = $dado;
    }

    public static function get(string $key) : mixed
    {
        session_start();
        return $_SESSION[$key] ?? null;
    }

    public static function delete(string $key) : void
    {
        session_start();
        unset($_SESSION[$key]);
    }

    public static function exists(string $key) : bool
    {
        session_start();
        return isset($_SESSION[$key]);
    }
}