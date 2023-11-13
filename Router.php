<?php

require_once './libs/Router.php';
require_once './app/controladores/peliculasController.php';


$router = new Router();


// Rutas GET
$router->addRoute('peliculas', 'GET', 'peliculasController', 'getPeliculas');
$router->addRoute('peliculas/:ID', 'GET', 'peliculasController', 'getPelicula');
$router->addRoute('peliculas/:TYPE/:AS', 'GET', 'peliculasController', 'getPeliculas');


// Rutas POST
$router->addRoute('peliculas', 'POST', 'peliculasController', 'postPelicula');


// Rutas DELETE
$router->addRoute('peliculas/:ID', 'DELETE', 'peliculasController', 'deletePelicula');

// Rutas PUT
$router->addRoute('peliculas/:ID', 'PUT', 'peliculasController', 'updatePelicula');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);