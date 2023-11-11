<?php

require_once './libs/Router.php';
require_once './app/controladores/peliculasController.php';


$router = new Router();

$router->addRoute('peliculas', 'GET', 'peliculasController', 'getPeliculas');
$router->addRoute('peliculas/:ID', 'GET', 'peliculasController', 'getPelicula');

$router->addRoute('peliculas', 'POST', 'peliculasController', 'postPelicula');

$router->addRoute('peliculas/:ID', 'DELETE', 'peliculasController', 'deletePelicula');

$router->addRoute('peliculas/:ID', 'PUT', 'peliculasController', 'updatePelicula');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);