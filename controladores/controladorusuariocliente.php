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
            $clientes = new Modeloclientes();
            $datos =  $clientes->setGuardar($nombre_usuario, $contraenia_usuario, $id_cliente,$correo_usuario);
            require_once("../vistas/usuarioClientes.php");
        }

        function Actualizar($id,$nombre_usuario, $contraenia_usuario, $id_cliente,$correo_usuario,$estado){
            require_once("../modelos/modelousuariocliente.php");
            $clientes = new Modeloclientes();
            $datos =  $clientes->setActualizar($id,$nombre_usuario, $contraenia_usuario, $id_cliente,$correo_usuario,$estado);
            require_once("../vistas/usuarioClientes.php");
        }


  
    }
    
    if(isset($_GET['id_usuarioCliente'])){
        require_once("../modelos/modelousuariocliente.php");
        $clientes = new Modeloclientes();
        $id = $_GET['id_usuarioCliente'];
        header('Location: ../vistas/usuarioClientes.php');
        
        return  $clientes->setEliminar($id);  
    }

?>