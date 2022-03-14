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

       function Actualizar($id,$nom_cliente, $apellido_cliente, $RTN,$direccion_cliente , $id_ciudad, $tel_cliente,$estado,$DNI_Cliente)
       {
            require_once("../modelos/modeloclientes.php");
            $clientes = new Modeloclientes();
            $datos = $clientes->setActualizar($id,$nom_cliente, $apellido_cliente, $RTN,$direccion_cliente , $id_ciudad, $tel_cliente,$estado,$DNI_Cliente);
            require_once("../vistas/clientes.php"); }
        

    
    }

    function Listar1($id)
    {
        require_once("../modelos/modeloclientes.php");
        $clientes = new Modeloclientes();
        $datos = $clientes->getclientes1($id);
        return $datos;
    }

    if(isset($_GET['id_cliente']))
    {
        require_once("../modelos/modeloclientes.php");
        $clientes = new Modeloclientes();
        $id = $_GET['id_cliente'];
        header('Location: ../vistas/clientes.php');
        
        return  $clientes->setEliminar($id);  
    }

    



       //Actualizar
       if(isset($_POST['update']))
       {
        require_once("../modelos/modeloclientes.php");
        $clientes = new Modeloclientes();

        $id = $_GET['id'];
        $nombre = $_POST['InputNom'];
        $apellido = $_POST['InputApe'];
        $rtn = $_POST['InputRTN'];
        $direccion =$_POST['InputDireccion'];
        $ciudad = $_POST['InputCiudad'];
        $telefono =$_POST['InputUsuario'];
        $estado = $_POST['InputEstado'];
        $dni = $_POST['InputDireccop'];
        
        
        

       header('Location: ../vistas/clientes.php');
        return $clientes->setActualizar($id,$nombre, $apellido, $rtn,$direccion , $ciudad, $telefono,$estado,$dni);
    }

?>