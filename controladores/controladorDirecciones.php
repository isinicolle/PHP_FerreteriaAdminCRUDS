<?php
    class ControladorDirecciones{
        public function __construct() {
        }
        function Listar(){
            require_once("../modelos/modelodirecciones.php");
            $direcciones = new Modelodirecciones();
            $datos = $direcciones->getdirecciones();
            return $datos;
        }
  
    }
    

?>