<?php 

class modelo_clientes 
{
    private $db;
    private $clientes;

    //funcion constructora
    public function construct()
    {
       $this -> clientes = array();
       $this -> db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    //funcion de listar
     public function get_clientesU()
     {
         $sql = "
         SELECT [id_cliente]
               ,[nom_cliente]
               ,[apellido_cliente]
               ,[RTN]
               ,[direccion_cliente]
               ,[id_ciudad]
               ,[tel_cliente]
               ,[estado]
               ,[DNI_Cliente]
           FROM [dbo].[Clientes]";
         $resultado = $this->db->query($sql);

         while($row = $resultado->fetch_assoc())
         {
             $this->clientes[] = $row;
         }
         return $this->clientes;
     }


}

?>