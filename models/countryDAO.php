<?php

class CountryDAO
{

    private $id_country;
    private $name;
    private $id_region_region;

    public function __construct($id_country, $name, $id_region_region)
    {
        $this->id_country = $id_country;
        $this->name = $name;
        $this->id_region_region = $id_region_region;
    }

    public function getCountries()
    {
        return "SELECT * FROM country";
    }

    public function getCountryById($filter)
    {
        return "SELECT * FROM country WHERE id_country = '" . $filter . "'";
    }
}
