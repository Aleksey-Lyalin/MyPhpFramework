<?php
// echo __FILE__;
echo $query = $_SERVER['QUERY_STRING'];
require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
// $router = new Router();
// Router::add ('posts/add', ['controller'=>'posts','action'=>'add']);
// Router::add ('', ['controller'=>'main','action'=>'index']);
Router::add('^$',['controller'=>'main','action'=>'index']);
Router::add('(?<controller>[a-z-]+)/(?P<action>[a-z-]+)');

debug(Router::getRoutes());
if(Router::matchRoute($query)){
    debug(Router::getRoute());
} else{
    echo '404';
}