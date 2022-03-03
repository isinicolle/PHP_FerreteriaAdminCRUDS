<?php

class controladorClientes{

    public function index()
    {
        require_once "./modelos/modeloclientes.php";
        $clientes = new modelo_clientes();
        $data["titulo"] = "Clientes";
        $data["clientes"] =  $clientes -> get_clientesU();

        require_once "./vistas/clientes.php";
    }
}

?>