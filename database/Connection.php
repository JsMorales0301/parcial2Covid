<?php

class Conexion
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'covid';
    private $mysqli;
    private $resultado;


    public function conectar()
    {
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        $this->mysqli->set_charset("utf8");
        if (!$this->mysqli) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit();
        }
    }

    public function cerrarConexion()
    {
        $this->mysqli->close();
    }

    public function ejecutar($sentencia)
    {
        $this->resultado = $this->mysqli->query($sentencia);
    }

    public function extraer()
    {
        return $this->resultado->fetch_row();
    }

    public function numFilas()
    {
        return ($this->resultado != null) ? $this->resultado->num_rows : 0;
    }

    public function fetch()
    {
        return $this->resultado->fetch_assoc();
    }
}
