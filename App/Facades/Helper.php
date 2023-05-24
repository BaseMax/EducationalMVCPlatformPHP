<?php

namespace Application\Facades;

class Helper extends Facade
{
    /**
     * Escaping variables in routes with REGEX for matching
     * 
     * @param string $path
     * @return string
     */
    public static function escape(string $path): string
    {
        $escapedPath = preg_quote($path, "/");

        $escapedPath = str_replace("\{id\}", "([^\/]+)", $escapedPath);
        $escapedPath = str_replace("\{quiz_id\}", "([^\/]+)", $escapedPath);
        $escapedPath = str_replace("\{question_id\}", "([^\/]+)", $escapedPath);

        return $escapedPath;
    }

    /**
     * Generate a random string in needed length
     * 
     * @param int $length
     * @return string
     */
    public static function randomStr(int $length = 10): string
    {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        $charactersLen = strlen($characters);

        $randomString = "";
        for ($i = 0; $i < $charactersLen; $i++) {
            $randomString .= $characters[random_int(0, $charactersLen - 1)];
        }

        return $randomString;
    }

    /**
     * Check matches in sended route
     * 
     * @param string $path
     * @param string $route
     * @return array
     */
    public static function match(string $path, string $route): array
    {
        preg_match('/^' . $route . '$/', $path, $matches);

        return $matches;
    }
}
