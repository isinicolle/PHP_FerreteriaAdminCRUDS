<?php

class Modelodirecciones {
    
    private $direcciones;
    private $db;

    public function __construct() {
        $this->direcciones= array();
        $this->db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getdirecciones() {

       // self::setNames();
        $sql = "SELECT [id_direccionEnvio]
        ,[direccion]
        ,[id_ciudad]
        ,[id_usuarioCliente]
        ,[direccion_opcional]
    FROM [dbo].[DireccionesEnvio]";
        foreach ($this->db->query($sql) as $res) {
            $this->direcciones[] = $res;
        }
        return $this->direcciones;
        $this->db = null;
    }
}

    ?>