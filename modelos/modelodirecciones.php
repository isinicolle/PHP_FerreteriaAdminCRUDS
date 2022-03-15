<?php

class Modelodirecciones {
    
    private $direcciones;
    private $db;
    private $ciudades;
    private $usuarios;

    public function __construct() {
        $this->direcciones= array();
        $this->db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getdirecciones() {

       // self::setNames();
        $sql = "SELECT        dbo.DireccionesEnvio.id_direccionEnvio as id_direccionEnvio , 
        dbo.DireccionesEnvio.direccion as direccion, 
        dbo.Ciudades.nombre_ciudad as id_ciudad, 
        dbo.usuariosClientes.nombre_usuario as id_usuarioCliente, 
        dbo.DireccionesEnvio.direccion_opcional as direccion_opcional 
        FROM            dbo.DireccionesEnvio INNER JOIN
                                 dbo.Ciudades ON dbo.DireccionesEnvio.id_ciudad = dbo.Ciudades.id_ciudad INNER JOIN
                                 dbo.usuariosClientes ON dbo.DireccionesEnvio.id_usuarioCliente = dbo.usuariosClientes.id_usuarioCliente";
        foreach ($this->db->query($sql) as $res) {
            $this->direcciones[] = $res;
        }
        return $this->direcciones;
        $this->db = null;
    }


    public function getdirecciones1($id) {

        // self::setNames();
         $sql = "SELECT [id_direccionEnvio]
         ,[direccion]
         ,[id_ciudad]
         ,[id_usuarioCliente]
         ,[direccion_opcional]
     FROM [dbo].[DireccionesEnvio] WHERE id_direccionEnvio = $id";
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

    public function setActualizar($id, $direccion, $id_ciudad, $id_usuarioCliente,$direccion_opcional) {

        //self::setNames();
        $sql = "UPDATE [dbo].[DireccionesEnvio]
        SET [direccion] = '$direccion'
           ,[id_ciudad] = '$id_ciudad'
           ,[id_usuarioCliente] = '$id_usuarioCliente'
           ,[direccion_opcional] = '$direccion_opcional'
      WHERE id_direccionEnvio = '$id'";
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

    
    public function getciudad(){

        $sql = "SELECT [id_ciudad]
        ,[nombre_ciudad]
    FROM [dbo].[Ciudades]";
        foreach ($this->db->query($sql) as $res) {
            $this->ciudades[] = $res;
        }
        return $this->ciudades;
        $this->db = null;
    }


    public function getusuarios(){

        $sql = "SELECT [id_usuarioCliente]
        ,[nombre_usuario]
    FROM [dbo].[usuariosClientes]";
        foreach ($this->db->query($sql) as $res) {
            $this->usuarios[] = $res;
        }
        return $this->usuarios;
        $this->db = null;
    }





}

    ?>