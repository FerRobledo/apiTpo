<?php
require_once 'config.php';
require_once 'app/modelos/Model.php';
class PeliculasModel extends Model
{
    
    public function getAll($params = null)
    {
        $sql = "SELECT * FROM peliculas WHERE 1";
        $query = $this->db->prepare($sql);
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_OBJ);
        //usort($peliculas, 'ordenarPresupuesto');
        return $peliculas;
    }

    public function getPelicula($id)
    {
        if (!empty($id)) {
            $sql = "SELECT * FROM peliculas WHERE pelicula_id = ?";
            $query = $this->db->prepare($sql);
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    public function getPeliculasASC($tipo){
        $columnasValidas = ['nombre', 'presupuesto'];

        if(!empty($tipo) && in_array($tipo, $columnasValidas)){
            $sql = "SELECT * FROM peliculas ORDER BY $tipo ASC";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        return null;
    }

    public function getPeliculasDESC($tipo){
        $columnasValidas = ['nombre', 'presupuesto'];

        if(!empty($tipo) && in_array($tipo, $columnasValidas)){
            $sql = "SELECT * FROM peliculas ORDER BY $tipo DESC";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        return null;
    }

    public function insertarPelicula($nombre, $genero, $fecha, $premios, $duracion, $clasificacion, $presupuesto, $estudio, $director_id)
    {
        $sql = "INSERT INTO peliculas (nombre, genero, `fecha de lanzamiento`, premios, `duracion en min`, `clasificacion por edades`, presupuesto, `estudio de produccion`, director_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre, $genero, $fecha, $premios, $duracion, $clasificacion, $presupuesto, $estudio, $director_id]);
    }

    public function borrarPelicula($id)
    {
        $sql = "DELETE FROM peliculas WHERE pelicula_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
    }

    public function editarPelicula($id, $nombre, $genero, $fecha, $premios, $duracion, $clasificacion, $presupuesto, $estudio, $director_id)
    {
        $sql = "UPDATE peliculas SET nombre = ?, genero = ?, `fecha de lanzamiento` = ?, premios = ?, `duracion en min` = ?, `clasificacion por edades` = ?, presupuesto = ?, `estudio de produccion` = ?, director_id = ? WHERE pelicula_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre, $genero, $fecha, $premios, $duracion, $clasificacion, $presupuesto, $estudio, $director_id, $id]);
    }

    public function ordenarPresupuesto($a, $b){
        return $a['presupuesto'] - $b['presupuesto'];    
    }
}
