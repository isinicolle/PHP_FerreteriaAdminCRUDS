<?php

class Modeloclientes {
    
    private $clientes;
    private $db;

    public function __construct() {
        $this->clientes = array();
        $this->db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getclientes() {

       // self::setNames();
        $sql = "SELECT  id_usuarioCliente
        ,nombre_usuario
        ,contraenia_usuario
        ,id_cliente
        ,correo_usuario
        ,estado
    FROM [dbo].[usuariosClientes]";
        foreach ($this->db->query($sql) as $res) {
            $this->clientes[] = $res;
        }
        return $this->clientes;
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


    public function setEliminar($id) {

      //  self::setNames();
        $sql = "DELETE FROM [dbo].[DireccionesEnvio]
        WHERE id_direccionEnvio = '$id'";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}

    ?>