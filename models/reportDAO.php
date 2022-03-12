
<?php

class ReportDAO
{
    private $id_report;
    private $date;
    private $new_cases;
    private $cumulative_cases;
    private $new_deaths;
    private $cumulative_deaths;
    private $id_country_country;

    public function __construct($id_report = "", $date = "", $new_cases = "", $cumulative_cases = "", $new_deaths = "", $cumulative_deaths = "", $id_country_country = "")
    {
        $this->id_report = $id_report;
        $this->date = $date;
        $this->new_cases = $new_cases;
        $this->cumulative_cases = $cumulative_cases;
        $this->new_deaths = $new_deaths;
        $this->cumulative_deaths = $cumulative_deaths;
        $this->id_country_country = $id_country_country;
    }

    public function buscar($filtro)
    {
        return "SELECT * FROM report WHERE id_country_country = '" . $filtro . "'";
    }
}
