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

}

?>