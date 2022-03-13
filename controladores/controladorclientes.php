<?php
    class ControladorClientes{
        public function __construct() {
        }
        function Listar(){
            require_once("../modelos/modeloclientes.php");
            $clientes = new Modeloclientes();
            $datos = $clientes->getclientes();
            return $datos;
        }

        function Guardar($nom_cliente, $apellido_cliente, $RTN,$direccion_cliente , $id_ciudad, $tel_cliente,$DNI_Cliente){
            require_once("../modelos/modeloclientes.php");
            $clientes = new Modeloclientes();
            $datos = $clientes->setGuardar($nom_cliente, $apellido_cliente, $RTN,$direccion_cliente , $id_ciudad, $tel_cliente,$DNI_Cliente);
            require_once("../vistas/clientes.php");
        }

        function Actualizar($id,$nom_cliente, $apellido_cliente, $RTN,$direccion_cliente , $id_ciudad, $tel_cliente,$estado,$DNI_Cliente){
            require_once("../modelos/modeloclientes.php");
            $clientes = new Modeloclientes();
            $datos = $clientes->setActualizar($id,$nom_cliente, $apellido_cliente, $RTN,$direccion_cliente , $id_ciudad, $tel_cliente,$estado,$DNI_Cliente);
            require_once("../vistas/clientes.php");
        }

    
    }
    
    if(isset($_GET['id_cliente'])){
        require_once("../modelos/modeloclientes.php");
        $clientes = new Modeloclientes();
        $id = $_GET['id_cliente'];
        header('Location: ../vistas/clientes.php');
        
        return  $clientes->setEliminar($id);  
    }
?>