<?php 

class clientes 
{
    private $db;
    private $clientesU;

    //funcion constructora
    public function construct()
    {
       $this -> clientesU = array();
       $this -> db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    //funcion de listar
     public function get_clientesU()
     {
         $sql = "SELECT        dbo.Clientes.id_cliente, dbo.Clientes.nom_cliente, dbo.Clientes.apellido_cliente, dbo.Clientes.RTN, dbo.Clientes.direccion_cliente, dbo.Ciudades.nombre_ciudad, dbo.Clientes.tel_cliente, dbo.Clientes.estado, 
         dbo.Clientes.DNI_Cliente,  dbo.usuariosClientes.nombre_usuario ,dbo.usuariosClientes.correo_usuario, dbo.usuariosClientes.estado AS Estado_Usuario
FROM            dbo.usuariosClientes INNER JOIN
         dbo.Clientes ON dbo.usuariosClientes.id_cliente = dbo.Clientes.id_cliente INNER JOIN
         dbo.Ciudades ON dbo.Clientes.id_ciudad = dbo.Ciudades.id_ciudad";
         $resultado = $this->db->query($sql);

         while($row = $resultado->fetch_assoc())
         {
             $this->clientesU[] = $row;
         }
         return $this->clientesU;
     }


}

?>