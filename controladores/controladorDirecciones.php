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

        function Guardar(){
            require_once("../modelos/modelodirecciones.php");
            $direcciones = new Modelodirecciones();
            $datos = $direcciones->setGuardar($_POST['InputDireccion'], $_POST['InputCiudad'],$_POST['InputUsuario'], $_POST['InputDireccop']);
            require_once("../vistas/direcciones.php");
        }
  
    }
    

?>