<?php

require_once 'C:\xampp\htdocs\covid\database\Connection.php';
require_once 'C:\xampp\htdocs\covid\models\reportDAO.php';

class ReportController
{
    private $id_report;
    private $date;
    private $new_cases;
    private $cumulative_cases;
    private $new_deaths;
    private $cumulative_deaths;
    private $id_country_country;
    private $conexion;
    private $reportDAO;

    public function __construct($id_report = "", $date = "", $new_cases = "", $cumulative_cases = "", $new_deaths = "", $cumulative_deaths = "", $id_country_country = "")
    {
        $this->id_report = $id_report;
        $this->date = $date;
        $this->new_cases = $new_cases;
        $this->cumulative_cases = $cumulative_cases;
        $this->new_deaths = $new_deaths;
        $this->cumulative_deaths = $cumulative_deaths;
        $this->id_country_country = $id_country_country;
        $this->conexion = new Conexion();
        $this->reportDAO = new ReportDAO($this->id_report, $this->date, $this->new_cases, $this->cumulative_cases, $this->new_deaths, $this->cumulative_deaths, $this->id_country_country);
    }

    public function getReportsByFilter($filter)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->reportDAO->buscar($filter));
        $reports = array();
        while (($registro = $this->conexion->extraer()) != null) {
            $report = new ReportController($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $registro[5], $registro[6]);
            array_push($reports, $report);
        }
        $this->conexion->cerrarConexion();
        return $reports;
    }

    public function getId_report()
    {
        return $this->id_report;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getCumulative_cases()
    {
        return $this->cumulative_cases;
    }

    public function getCumulative_deaths()
    {
        return $this->cumulative_deaths;
    }

    public function getnew_cases()
    {
        return $this->new_cases;
    }

    public function getnew_deaths()
    {
        return $this->new_deaths;
    }
}
