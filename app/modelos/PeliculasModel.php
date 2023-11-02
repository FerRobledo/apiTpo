<?php
require_once 'config.php';
class PeliculasModel{
    private $db;

    public function __construct()
    {
        $this->db = $this->connectDb();
    }

    public function connectDb()
    {
        $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        return $db;
    }

    public function getAll($params = null)
    {
        $sql = "SELECT * FROM peliculas WHERE 1";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);   
    }

    public function getPelicula($id)
    {
        if(!empty($id)){
            $sql = "SELECT * FROM peliculas WHERE pelicula_id = ?";
            $query = $this->db->prepare($sql);
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }
}