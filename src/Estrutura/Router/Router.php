<?php

namespace HenriqueBS0\AgendaTarefas\Estrutura\Router;

use Closure;
use Throwable;

/**
 * Classe Router para gerenciar rotas e middleware.
 */
class Router {
    
    /**
     * Array associativo para armazenar rotas.
     * @var array
     */
    private array $routes = [];

    /**
     * Adiciona uma rota ao roteador.
     *
     * @param string $httpMethod Método HTTP da rota (GET, POST, etc.).
     * @param string $path Caminho da rota.
     * @param array $callback Função de callback a ser executada quando a rota é acessada.
     * @param IMiddleware[]|null $middleware Array de middleware a ser aplicado à rota.
     * @return self
     */
    public function addRoute(string $httpMethod, string $path, array $callback, ?array $middleware = null) : self
    {
        $this->routes[$path][strtoupper($httpMethod)] = [
            'callback' => $callback, 
            'middleware' => $middleware ?? []
        ];
        return $this;
    }

    /**
     * Resolve a rota atual com base no método HTTP e no caminho da requisição.
     *
     * @return void
     */
    public function resolve() : void
    {
        $path = $_GET['path'] ?? '/';
        $httpMethod = self::getHttpMethod();

        // Verificar se a rota existe
        if (!isset($this->routes[$path][$httpMethod])) {
            // Aqui você pode definir uma ação padrão para rotas não encontradas
            echo "Rota não encontrada.";
            return;
        }

        $route = $this->routes[$path][$httpMethod];

        // Aplicar middleware, se houver
        if (!empty($route['middleware'])) {
            foreach ($route['middleware'] as $middleware) {
                if ($middleware instanceof IMiddleware) {
                    try {
                        $middleware->resolve();
                    } catch (Throwable $e) {
                        // Tratar exceção do middleware
                        echo "Erro no middleware: " . $e->getMessage();
                        return;
                    }
                }
            }
        }

        // Executar o callback da rota
        if (is_callable($route['callback'])) {
            call_user_func($route['callback']);
        } else {
            echo "Callback inválido para a rota.";
        }
    }

    /**
     * Obtém o método HTTP da requisição atual.
     *
     * @return string Método HTTP da requisição.
     */
    private static function getHttpMethod() : string
    {
        if(strtoupper($_SERVER['REQUEST_METHOD']) !== 'GET') {
            return strtoupper($_SERVER['REQUEST_METHOD']);
        }

        return isset($_GET['__method']) 
            ? strtoupper($_GET['__method']) 
            : 'GET';
    }
}