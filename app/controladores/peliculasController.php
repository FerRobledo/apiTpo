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

    function getPeliculas($params = null) 
    {
        $peliculas = $this->model->getAll();
        return $this->view->response($peliculas, 200);
    }

    function getPelicula($params = null)
    {
        $id =  $params[':ID'];
        $task = $this->model->getPelicula($id);

        if($task)
            $this->view->response($task, 200);
        else
            $this->view->response("La pelicula $id no existe", 404);
    }

    function crearPelicula()
    {

    }
  
}
