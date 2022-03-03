<?php 

class direcciones
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
       public function get_veiculos()
       {
           $sql = "";
           $resultado = $this->db->query($sql);

           while($row = $resultado->fetch_assoc())
           {
               $this->direcciones[] = $row;
           }
           return $this->direcciones;
       }

}
?>