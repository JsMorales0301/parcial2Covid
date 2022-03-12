<?php

class RegionDAO
{
    private $id_region;
    private $name;

    public function __construct($id_region = "", $name = "")
    {
        $this->id_region = $id_region;
        $this->name = $name;
    }

    public function buscar($filtro)
    {
        return "SELECT * FROM region WHERE id_region = '" . $filtro . "'";
    }
}
