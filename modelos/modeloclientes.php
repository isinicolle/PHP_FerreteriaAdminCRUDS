<?php

class Modeloclientes {
    
    private $clientes;
    private $db;
    private $ciudades;

    public function __construct() {
        $this->clientes = array();
        $this->db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getclientes() {

       // self::setNames();
        $sql = "SELECT        dbo.Clientes.id_cliente as id_cliente,
        dbo.Clientes.nom_cliente as nom_cliente, 
        dbo.Clientes.apellido_cliente as apellido_cliente, 
        dbo.Clientes.RTN as RTN,
        dbo.Clientes.direccion_cliente as direccion_cliente, 
        dbo.Ciudades.nombre_ciudad as id_ciudad, 
        dbo.Clientes.tel_cliente as tel_cliente, 
        dbo.Clientes.estado as estado,                  
        dbo.Clientes.DNI_Cliente as DNI_Cliente
    FROM            dbo.Clientes INNER JOIN
                             dbo.Ciudades ON dbo.Clientes.id_ciudad = dbo.Ciudades.id_ciudad";
        foreach ($this->db->query($sql) as $res) {
            $this->clientes[] = $res;
        }
        return $this->clientes;
        $this->db = null;
    }

    public function getclientes1($id) {

        // self::setNames();
         $sql = "SELECT id_cliente
         ,nom_cliente
         ,apellido_cliente
         ,RTN
         ,direccion_cliente
         ,id_ciudad
         ,tel_cliente
         ,estado
         ,DNI_Cliente
     FROM [dbo].Clientes WHERE id_cliente = $id";
         foreach ($this->db->query($sql) as $res) {
             $this->clientes[] = $res;
         }
         return $this->clientes;
         $this->db = null;
     }


    public function setGuardar($nom_cliente, $apellido_cliente, $RTN,$direccion_cliente , $id_ciudad, $tel_cliente,$DNI_Cliente) {

        //self::setNames();
        $sql = "INSERT INTO [dbo].[Clientes]
        ([nom_cliente]
        ,[apellido_cliente]
        ,[RTN]
        ,[direccion_cliente]
        ,[id_ciudad]
        ,[tel_cliente]
        ,[estado]
        ,[DNI_Cliente])
        VALUES
        ('$nom_cliente','$apellido_cliente', '$RTN','$direccion_cliente',' $id_ciudad','$tel_cliente','1','$DNI_Cliente' )";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function setActualizar($id,$nom_cliente, $apellido_cliente, $RTN,$direccion_cliente , $id_ciudad, $tel_cliente,$estado,$DNI_Cliente) {

        //self::setNames();
        $sql = "UPDATE [dbo].[Clientes]
        SET [nom_cliente] = '$nom_cliente'
           ,[apellido_cliente] = '$apellido_cliente'
           ,[RTN] = '$RTN'
           ,[direccion_cliente] = '$direccion_cliente'
           ,[id_ciudad] = '$id_ciudad'
           ,[tel_cliente] = '$tel_cliente'
           ,[estado] = '$estado'
           ,[DNI_Cliente] = '$DNI_Cliente'
      WHERE id_cliente = $id";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function setEliminar($id) {

      //  self::setNames();
        $sql = "DELETE FROM [dbo].[Clientes]
        WHERE id_cliente = '$id'";
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

}

    ?>