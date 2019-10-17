<?php
// echo __FILE__;
echo $query = rtrim($_SERVER['QUERY_STRING'],'/');
define('WWW',__DIR__);
define('CORE', dirname(__DIR__).'/vendor.core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__).'/app');

require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
// require '../app/controllers/Main.php';
// require '../app/controllers/Posts.php';
// require '../app/controllers/PostsNew.php';
spl_autoload_register(function($class){
$file = APP."/controllers/$class.php";
if(is_file($file)){
    require_once($file);
}
});

Router::add('^$',['controller'=>'main','action'=>'index']);
Router::add('^(?<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

debug(Router::getRoutes());

Router::dispatch($query);
