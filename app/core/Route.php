<?php 

namespace App\Core;

class Route
{
    private $path;
    private $controller;
    private $action;

    public function __construct($path, $controller, $action)
    {
       $this->path = $path;
       $this->controller = $controller;
       $this->action = $action;
    }
    
    public function __get($property)
    {
        return $this->$property;
    }
}
