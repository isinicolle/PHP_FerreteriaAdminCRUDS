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

        function Guardar($direccion, $id_ciudad, $id_usuarioCliente,$direccion_opcional ){
            require_once("../modelos/modelodirecciones.php");
            $direcciones = new Modelodirecciones();
            $datos = $direcciones->setGuardar($direccion, $id_ciudad, $id_usuarioCliente,$direccion_opcional);
            require_once("../vistas/direcciones.php");
        }

        function Actualizar($id, $direccion, $id_ciudad, $id_usuarioCliente,$direccion_opcional){
            require_once("../modelos/modelodirecciones.php");
            $direcciones = new Modelodirecciones();
            $datos = $direcciones->setActualizar($id, $direccion, $id_ciudad, $id_usuarioCliente,$direccion_opcional);
            require_once("../vistas/direcciones.php");
        }

      
    }
    
    if(isset($_GET['id_direccionEnvio'])){
        require_once("../modelos/modelodirecciones.php");
        $direcciones = new Modelodirecciones();
        $id = $_GET['id_direccionEnvio'];
        header('Location: ../vistas/direcciones.php');
        
        return  $direcciones->setEliminar($id);  
    }
?>