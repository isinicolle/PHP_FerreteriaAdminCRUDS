<?php 

class modelo_direcciones
{
    private $db;
    private $direcciones;

    //funcion constructora
    public function construct()
    {
       $this -> direcciones = array();
       $this -> db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

       //funcion de listar
       public function get_direcciones()
       {
           $sql = "SELECT        dbo.DireccionesEnvio.id_direccionEnvio, dbo.DireccionesEnvio.direccion, dbo.Ciudades.nombre_ciudad, dbo.usuariosClientes.nombre_usuario, dbo.DireccionesEnvio.direccion_opcional, dbo.Ciudades.codigoPostal, 
           dbo.Departamentos.nombreDepartamento
FROM            dbo.DireccionesEnvio INNER JOIN
           dbo.usuariosClientes ON dbo.DireccionesEnvio.id_usuarioCliente = dbo.usuariosClientes.id_usuarioCliente INNER JOIN
           dbo.Ciudades ON dbo.DireccionesEnvio.id_ciudad = dbo.Ciudades.id_ciudad INNER JOIN
           dbo.Departamentos ON dbo.Ciudades.id_departamento = dbo.Departamentos.id_departamento";
           $resultado = $this->db->query($sql);

           while($row = $resultado->fetch_assoc())
           {
               $this->direcciones[] = $row;
           }
           return $this->direcciones;
       }

}
?>