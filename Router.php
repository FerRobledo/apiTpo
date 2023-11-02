<?php

require_once './libs/Router.php';
require_once './app/controladores/peliculasController.php';


$router = new Router();

$router->addRoute('peliculas', 'GET', 'peliculasController', 'getPeliculas');
$router->addRoute('peliculas', 'POST', 'peliculasController', 'crearPelicula');
$router->addRoute('peliculas/:ID', 'GET', 'peliculasController', 'getPelicula');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);