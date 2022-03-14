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
        $sql = "SELECT id_cliente
        ,nom_cliente
        ,apellido_cliente
        ,RTN
        ,direccion_cliente
        ,id_ciudad
        ,tel_cliente
        ,estado
        ,DNI_Cliente
    FROM [dbo].Clientes";
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

}

    ?>