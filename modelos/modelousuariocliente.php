<?php

class Modeloclientes {
    
    private $clientes;
    private $db;
    private $clien;

    public function __construct() {
        $this->clientes = array();
        $this->db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getclientes() {

       // self::setNames();
        $sql = "
        SELECT        dbo.usuariosClientes.id_usuarioCliente as id_usuarioCliente, 
        dbo.usuariosClientes.nombre_usuario as nombre_usuario, 
        dbo.usuariosClientes.contraenia_usuario as contraenia_usuario,  
        Concat(dbo.Clientes.nom_cliente,' ', 
        dbo.Clientes.apellido_cliente) as id_cliente, 
        dbo.usuariosClientes.correo_usuario as correo_usuario, 
        dbo.usuariosClientes.estado as  estado
        FROM            dbo.usuariosClientes INNER JOIN
                                 dbo.Clientes ON dbo.usuariosClientes.id_cliente = dbo.Clientes.id_cliente";
        foreach ($this->db->query($sql) as $res) {
            $this->clientes[] = $res;
        }
        return $this->clientes;
        $this->db = null;
    }

    public function getclientes1($id) {

        // self::setNames();
         $sql = "SELECT  id_usuarioCliente
         ,nombre_usuario
         ,contraenia_usuario
         ,id_cliente
         ,correo_usuario
         ,estado
     FROM [dbo].[usuariosClientes] WHERE id_usuarioCliente = '$id'" ;
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

    public function setActualizar($id,$nombre_usuario, $contraenia_usuario, $id_cliente,$correo_usuario,$estado) {

        //self::setNames();
        $sql = "UPDATE [dbo].[usuariosClientes]
        SET [nombre_usuario] = '$nombre_usuario',
           [contraenia_usuario] = '$contraenia_usuario',
           [id_cliente] = '$id_cliente',
           [correo_usuario] = '$correo_usuario',
           [estado] = '$estado'
           WHERE id_usuarioCliente = '$id'";
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

    //combobox clientes
    public function getclien(){

        $sql = "SELECT      id_cliente , 
        CONCAT(nom_cliente,' ',apellido_cliente)  as  nom_cliente
        FROM            dbo.Clientes";
        foreach ($this->db->query($sql) as $res) {
            $this->clien[] = $res;
        }
        return $this->clien;
        $this->db = null;
    }


}

    ?>