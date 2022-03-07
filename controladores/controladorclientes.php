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

        function Eliminar($id ){
            require_once("../modelos/modeloclientes.phphp");
            $clientes = new Modeloclientes();
            $datos = $clientes->setEliminar($id);
            require_once("../vistas/clientes.php");
        }
  
    }
    

?>