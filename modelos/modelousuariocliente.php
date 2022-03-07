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

    public function setGuardar($nombre_usuario, $contraenia_usuario, $id_cliente,$correo_usuario) {

        //self::setNames();
        $sql = "INSERT INTO [dbo].[usuariosClientes]
        ([nombre_usuario]
        ,[contraenia_usuario]
        ,[id_cliente]
        ,[correo_usuario]
        ,[estado])
        VALUES
        ('$nombre_usuario', '$contraenia_usuario', '$id_cliente','$correo_usuario','1')";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function setEliminar($id) {

      //  self::setNames();
        $sql = "DELETE FROM [dbo].[usuariosClientes]
        WHERE id_usuarioCliente = '$id'";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}

    ?>