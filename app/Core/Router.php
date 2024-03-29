<?php

namespace App\Core;
use App\Controllers;


class Router
{
    private $get = [];
    private $post = [];

    public static function make()
    {
        $router = new self();
        return $router;
    }

    public function get($uri, $action)
    {
        $this->get[$uri] = $action;
        return $this;
    }

    public function post($uri, $action)
    {
        $this->post[$uri] = $action;
        return $this;
    }


    public function resolve($uri, $method)
    {
        if (array_key_exists($uri, $this->{$method})) {  //
            $action = $this->{$method}[$uri];  // [[0]=>TaskControllers,[1]=>index]
            $this->callAction(...$action);  // ("TaskControllers", "index")
        } else {
            redirect(home());
            // throw new Exception("Page not found");
        }
    }


    protected function callAction($controller, $action)
    {

        $controller = new $controller();
        $controller->{$action}();

    }
}
