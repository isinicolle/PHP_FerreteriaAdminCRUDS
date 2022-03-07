<?php
    class ControladorClientes{
        public function __construct() {
        }
        function Listar(){
            require_once("../modelos/modelousuariocliente.php");
            $clientes = new Modeloclientes();
            $datos = $clientes->getclientes();
            return $datos;
        }
  
    }
    

?>