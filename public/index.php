<?php
// echo __FILE__;
echo $query = $_SERVER['QUERY_STRING'];
require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
require '../app/controllers/Main.php';
require '../app/controllers/Posts.php';
require '../app/controllers/PostsNew.php';

Router::add('^$',['controller'=>'main','action'=>'index']);
Router::add('^(?<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

debug(Router::getRoutes());

Router::dispatch($query);
