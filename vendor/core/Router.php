<?php
class Router
{
    // public function __construct()
    // { 
    //     echo 'Hellow World!';
    // }
    protected static $routes = [];
    protected static $route = [];
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }
    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function getRoute()
    {
        return self::$route;
    }
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                debug($matches);
                foreach($matches as $k=> $v){
                    if(is_string($k)){
                        $route[$k]=$v;
                    }
                }
                debug($matches);
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                self::$route = $route;
                debug($route);
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url){
        if(self::matchRoute($url)){
            $controller = self::upperCamelCase(self::$route['controller']);
            if (class_exists($controller)){
                echo 'Ok';
            }else{
                echo "контроллер  <b>$controller</b> не найден";
            }
        } else{
            http_response_code(404);
            include '404.html';
        }
    }
    protected static function upperCamelCase($name){
        return str_replace(' ','',ucwords(str_replace('-',' ',$name)));
    }
}
