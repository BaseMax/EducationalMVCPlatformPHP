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
     * Start application for processing request
     * 
     * @return string
     */
    public function run(): string
    {
    }
}
