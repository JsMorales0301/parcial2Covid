<?php

require_once 'C:\xampp\htdocs\covid\database\Connection.php';
require_once 'C:\xampp\htdocs\covid\models\countryDAO.php';

class CountryController
{

    private $id_country;
    private $name;
    private $id_region_region;
    private $conexion;
    private $countryDAO;

    public function __construct($id_country = "", $name = "", $id_region_region = "")
    {
        $this->id_country = $id_country;
        $this->name = $name;
        $this->id_region_region = $id_region_region;
        $this->conexion = new Conexion();
        $this->countryDAO = new CountryDAO($this->id_country, $this->name, $this->id_region_region);
    }

    public function getId()
    {
        return $this->id_country;
    }
    public function getCountry()
    {
        return $this->name;
    }
    public function getCountries()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->countryDAO->getCountries());
        $paises = array();
        while (($registro = $this->conexion->extraer()) != null) {
            $pais = new CountryController($registro[0], $registro[1], $registro[2]);
            array_push($paises, $pais);
        }
        $this->conexion->cerrarConexion();
        return $paises;
    }

    public function getCountryById($filter)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->countryDAO->getCountryById($filter));
        $pais = array();
        while (($registro = $this->conexion->extraer()) != null) {
            $pais = new CountryController($registro[0], $registro[1], $registro[2]);
        }
        $this->conexion->cerrarConexion();
        return $pais;
    }
}
