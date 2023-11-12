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

        if ($task)
            $this->view->response($task, 200);
        else
            $this->view->response("La pelicula $id no existe", 404);
    }

    function getPeliculasOrdenadas($params = null)
    {
        $tipo = $params[':TYPE'];
        $orden = $params[':AS'];
        if($orden === 'ascendente'){
            $peliculas = $this->model->getPeliculasASC($tipo);
        } else if($orden === 'descendente'){
            $peliculas = $this->model->getPeliculasDESC($tipo);
        } else
            $this->view->response("El orden $orden no existe. Tiene que ser 'ascendente' o 'descendente'", 404);

        if($peliculas){
            $this->view->response($peliculas, 200);
        } else {
            $this->view->response("El tipo $tipo no es valido, solo se permite ordenar por 'nombre' y 'presupuesto'.", 404);
        }
    }

    function postPelicula($params = [])
    {
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

            $id = $this->model->insertarPelicula($nombre, $genero, $fecha, $premios, $duracion, $clasificacion, $presupuesto, $estudio, $director_id);
            $this->view->response("La pelicula creada correctamente con el id=" . $id, 201);
        } else {
            $this->view->response("Error al procesar la solicitud para crear la pelicula.", 400);
        }
    }

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
