<?php


namespace Core;



class Router{

    protected $routes = [];


    public function add($uri, $controller, $method){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;

    }

    public function get($uri, $controller){
       return $this->add($uri, $controller, 'GET');

    }

    public function post($uri, $controller){
        return $this->add($uri, $controller, 'POST');
 
     }

     public function patch($uri, $controller){
        return $this->add($uri, $controller, 'PATCH');
 
     }

     public function delete($uri, $controller){
        return $this->add($uri, $controller, 'DELETE');
 
     }

     public function put($uri, $controller)
     {
        return $this->add('PUT', $uri, $controller);
     }



     public function route($uri, $method){  
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)){
                // options for middleware here
                
                return require($route['controller']);
            }
        }

        $this->abort();
     }


     public function abort($code = 404)
     {
         http_response_code($code);
         require ("views/$code.php");
         die();
     }

}