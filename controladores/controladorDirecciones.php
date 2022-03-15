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
            header('Location: ../vistas/direcciones.php');
        }

        /*function Actualizar($id, $direccion, $id_ciudad, $id_usuarioCliente,$direccion_opcional){
            require_once("../modelos/modelodirecciones.php");
            $direcciones = new Modelodirecciones();
            $datos = $direcciones->setActualizar($id, $direccion, $id_ciudad, $id_usuarioCliente,$direccion_opcional);
            require_once("../vistas/direcciones.php");
        }*/

       

      
    }
    function listarCiudad(){
        require_once("../modelos/modelodirecciones.php");
        $direcciones = new Modelodirecciones();
        return $direcciones->getciudad();
    }

    function listarUsuarios(){
        require_once("../modelos/modelodirecciones.php");
        $direcciones = new Modelodirecciones();
        return $direcciones->getusuarios();
    }

    function Listar1($id){
        require_once("../modelos/modelodirecciones.php");
        $direcciones = new Modelodirecciones();
        $datos = $direcciones->getdirecciones1($id);
        return $datos;
    }

    
    if(isset($_GET['id_direccionEnvio'])){
        require_once("../modelos/modelodirecciones.php");
        $direcciones = new Modelodirecciones();
        $id = $_GET['id_direccionEnvio'];
        header('Location: ../vistas/direcciones.php');
        
        return  $direcciones->setEliminar($id);  
    }

      //Actualizar
      if(isset($_POST['update'])){
        require_once("../modelos/modelodirecciones.php");
        $direcciones = new Modelodirecciones();

        $id = $_GET['id'];
        $direccion = $_POST['InputDireccion'];
        $ciudad = $_POST['InputCiudad'];
        $usuario = $_POST['InputUsuario'];
        $direccop= $_POST ['InputDireccop'];;

        header('Location: ../vistas/direcciones.php');
        return $direcciones->setActualizar($id, $direccion, $ciudad, $usuario,$direccop);
    }

  
?>