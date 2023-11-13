<?php
require_once './app/controladores/apiController.php';
require_once './app/modelos/PeliculasModel.php';

class peliculasController extends ApiController
{
    private $model;
    public function __construct()
    {
        parent::__construct();
        $this->model = new PeliculasModel();
    }

    // OBTENER LISTA COMPLETA DE PELICULAS (ordenadas o no)
    function getPeliculas($params = null)
    {
        $type = $params [':TYPE'] ?? null;
        $orden = $params [':AS'] ?? null;

        if(empty($type) && empty($orden)){
            $peliculas = $this->model->getAll();
            return $this->view->response($peliculas, 200);
        }
        
        if($orden === 'ascendente'){
            $peliculas = $this->model->getPeliculasASC($type);
        } else if($orden === 'descendente'){
            $peliculas = $this->model->getPeliculasDESC($type);
        } else
            return $this->view->response("El orden $orden no existe. Tiene que ser 'ascendente' o 'descendente'", 404);

        if($peliculas){
            $this->view->response($peliculas, 200);
        } else {
            $this->view->response("El tipo $type no es valido, solo se permite ordenar por 'nombre' y 'presupuesto'.", 404);
        }
    }

    // OBTENER PELICULA MEDIANTE ID
    function getPelicula($params = null)
    {
        $id =  $params[':ID'];
        $task = $this->model->getPelicula($id);

        if ($task)
            $this->view->response($task, 200);
        else
            $this->view->response("La pelicula $id no existe", 404);
    }

    // ALTA
    function postPelicula($params = [])
    {
        $body = $this->getData();
        if($body){
            $nombre = $body->nombre;
            $genero = $body->genero;
            $fecha = $body->fecha;
            $premios = $body->premios;
            $duracion = $body->duracion;
            $clasificacion = $body->clasificacion;
            $presupuesto = $body->presupuesto;
            $estudio = $body->estudio;
            $director_id = $body->director;
            $this->model->insertarPelicula($nombre, $genero, $fecha, $premios, $duracion, $clasificacion, $presupuesto, $estudio, $director_id);
            $this->view->response("La pelicula creada correctamente", 201);
        } else{
            $this->view->response("Error al procesar la solicitud para crear la pelicula.", 400);
        }
    }
    

    // BAJA
    function deletePelicula($params = [])
    {
        $id = $params[':ID'];
        $pelicula = $this->model->getPelicula($id);

        if ($pelicula) {
            $this->model->borrarPelicula($id);
            $this->view->response("La pelicula con id=" . $id . " ha sido borrada.", 200);
        } else {
            $this->view->response("La pelicula con id=" . $id . " no existe.", 404);
        }
    }


    // MODIFICACION
    function updatePelicula($params = [])
    {
        $id = $params[':ID'];
        $pelicula = $this->model->getPelicula($id);

        if ($pelicula) {
            $inputJSON = file_get_contents('php://input');
            $input = json_decode($inputJSON, TRUE);

            if ($input) {
                $nombre = $input->nombre;
                $genero = $input->genero;
                $fecha = $input->fecha;
                $premios = $input->premios;
                $duracion = $input->duracion;
                $clasificacion = $input->clasificacion;
                $presupuesto = $input->presupuesto;
                $estudio = $input->estudio;
                $director_id = $input->director;

                $this->model->editarPelicula($id, $nombre, $genero, $fecha, $premios, $duracion, $clasificacion, $presupuesto, $estudio, $director_id);
                
                $this->view->response("La pelicula con id=" . $id . " ha sido modificada.", 200);
            } else {
                $this->view->response("La pelicula con id=" . $id . " no existe.", 404);
            }
        }
    }
}
