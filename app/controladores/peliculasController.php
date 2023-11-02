<?php
require_once './app/modelos/PeliculasModel.php';
require_once './app/vistas/APIView.php';

class peliculasController
{
    private $model;
    private $view;
    public function __construct()
    {
        $this->model = new PeliculasModel();
        $this->view = new APIView();
    }

    function getPeliculas($params = []) 
    {
        $peliculas = $this->model->getAll();
        return $this->view->response($peliculas, 200);
    }

    function crearPelicula()
    {
        
    }
  
}
