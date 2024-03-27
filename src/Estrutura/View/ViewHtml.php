<?php

namespace HenriqueBS0\AgendaTarefas\Estrutura\View;

abstract class ViewHtml implements IView {
    abstract public function render($data = []);

    final public static function redirect($path, $params = []) : void
    {
        // Verificar se o array de parâmetros está vazio
        if (!empty($params)) {
            // Construir a string de consulta a partir do array de parâmetros
            $queryString = http_build_query($params);
            // Adicionar a string de consulta ao URL de redirecionamento
            $url = PROJECT_URL . "/?path=$path&" . $queryString;
        } else {
            // Se o array de parâmetros estiver vazio, não adicionar a string de consulta
            $url = PROJECT_URL . "/?path=$path";
        }

        var_dump($url);

        // Redirecionar para a nova URL
        header("Location: $url");
    }

    protected final static function getHtml(string $path) : string
    {
        return trim(file_get_contents(VIEW_HTML_PATH . '/' . $path . '.html'));
    }
    protected final static function replaceData(string $content, array $data) : string
    {
        return str_replace(
            array_map(function($key) {return "{{$key}}";}, array_keys($data)), 
            array_values($data), 
            $content
        );
    }

    protected final static function getHtmlAndReplaceData(string $path, array $data) : string
    {
        return self::replaceData(self::getHtml($path), $data);
    }
}