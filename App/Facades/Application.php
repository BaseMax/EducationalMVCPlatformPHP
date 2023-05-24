<?php

namespace Application\Facades;

class Application extends Facade
{
    /**
     * Instance of Router Facade
     * 
     * @var Router
     */
    private Router $router;


    /**
     * Main constructor class
     */
    public function __construct()
    {
        $this->router = new Router();
    }


    /**
     * Start application for processing request
     * 
     * @return string
     */
    public function run(): string
    {
        return $this->router->resolve();
    }
}
