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

        function Guardar($nombre_usuario, $contraenia_usuario, $id_cliente,$correo_usuario){
            require_once("../modelos/modelousuariocliente.php");
            $direcciones = new Modeloclientes();
            $datos = $direcciones->setGuardar($nombre_usuario, $contraenia_usuario, $id_cliente,$correo_usuario);
            require_once("../vistas/usuarioClientes.php");
        }

        function Eliminar($id ){
            require_once("../modelos/modelousuariocliente.php");
            $direcciones = new Modeloclientes();
            $datos = $direcciones->setEliminar($id);
            require_once("../vistas/usuarioClientes.php");
        }
  
    }
    

?>