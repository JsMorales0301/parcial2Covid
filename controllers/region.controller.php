<?php

require_once 'C:\xampp\htdocs\covid\database\Connection.php';
require_once 'C:\xampp\htdocs\covid\models\regionDAO.php';

class RegionController
{
    private $id_region;
    private $name;
    private $conexion;
    private $regionDAO;

    public function __construct($id_region = "", $name = "")
    {
        $this->id_region = $id_region;
        $this->name = $name;
        $this->conexion = new Conexion();
        $this->regionDAO = new RegionDAO($this->id_region, $this->name);
    }

    public function consultar($filtro)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->regionDAO->buscar($filtro));
        $regiones = array();
        while (($registro = $this->conexion->extraer()) != null) {
            $region = new RegionController($registro[0], $registro[1]);
            array_push($regiones, $region);
        }
        $this->conexion->cerrarConexion();
        return $regiones;
    }
}
