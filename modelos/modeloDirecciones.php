<?php 

class direcciones
{
    private $db;
    private $direcciones;

    public function construct()
    {
       $this -> direcciones = array();
       $this -> db = new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

}
?>