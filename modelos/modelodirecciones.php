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

    public function setGuardar($direccion, $id_ciudad, $id_usuarioCliente,$direccion_opcional ) {

        //self::setNames();
        $sql = "INSERT INTO DireccionesEnvio
        (direccion
        ,id_ciudad
        ,id_usuarioCliente
        ,direccion_opcional)
        VALUES
        ('$direccion ', ' $id_ciudad', ' $id_usuarioCliente', '$direccion_opcional')";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }



}

    ?>