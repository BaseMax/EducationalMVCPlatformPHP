<?php

namespace Application\Facades;

class Router extends Facade
{
    /**
     * Map routes with callbacks
     * 
     * @var array $mapper
     */
    private static array $mapper = [
        "get"       => [],
        "post"      => [],
        "put"       => [],
        "delete"    => [],
        "fallback"  => null
    ];


    /**
     * Add a route for get method
     * 
     * @param string $path
     * @param array $callback
     * @return void
     */
    public static function get(string $path, array $callback): void
    {
        $path = Helper::escape($path);

        self::$mapper["get"][$path] = $callback;
    }

    /**
     * Add a route for post method
     * 
     * @param string $path
     * @param array $callback
     * @return void
     */
    public static function post(string $path, array $callback): void
    {
        $path = Helper::escape($path);

        self::$mapper["post"][$path] = $callback;
    }

    /**
     * Add a route for put method
     * 
     * @param string $path
     * @param array $callback
     * @return void
     */
    public static function put(string $path, array $callback): void
    {
        $path = Helper::escape($path);

        self::$mapper["put"][$path] = $callback;
    }

    /**
     * Add a route for delete method
     * 
     * @param string $path
     * @param array $callback
     * @return void
     */
    public static function delete(string $path, array $callback): void
    {
        $path = Helper::escape($path);

        self::$mapper["delete"][$path] = $callback;
    }

    /**
     * Add fallback function when requested route not found
     * 
     * @param array $callback
     * @return void
     */
    public static function fallback(array $callback): void
    {
        self::$mapper["fallback"] = $callback;
    }

    /**
     * Start finding correct route or call fallback function if route not found
     * 
     * @return string
     */
    public function resolve(): string
    {
        $method = Request::method();
        $path = Request::path();

        foreach (array_keys(self::$mapper[$method]) as $route) {
            $params = Helper::match($path, $route);

            if ($params) {
                $instance = new self::$mapper[$method][$route][0];
                $methodOfController = self::$mapper[$method][$route][1];
                return call_user_func([$instance, $methodOfController], array_slice($params, 1));
            }
        }

        if (self::$mapper["fallback"] !== null) {
            $instance = new self::$mapper["fallback"][0];
            $methodOfController = self::$mapper["fallback"][1];
            return call_user_func([$instance, $methodOfController]);
        }

        return Response::json([
            "detail" => "Oops! The page you're looking for could not be found."
        ], Response::$NOT_FOUND);
    }
}
