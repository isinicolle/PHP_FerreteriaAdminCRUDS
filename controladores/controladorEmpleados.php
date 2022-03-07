<?php
    include_once('../modelos/modeloEmpleados.php');
    function listar(){
        $modeloEmpleado = new Empleados();
        return $modeloEmpleado->getEmpleados();
    }
    $modeloEmpleado = new Empleados();
    if(isset($_POST['save'])){
        $nombre = $_POST['nom_empleado'];
        $apellido = $_POST['apellido_empleado'];
        $telefono = $_POST['telefono_empleado'];
        $direccion = $_POST['direccion_empleado'];
        $fecha = $_POST['fnacimiento_empleado'];
        $idCiudad = $_POST['id_ciudad'];
        $idRol = $_POST['id_rol'];
        $estado = $_POST['estado'];
        $usuario = $_POST['nom_usuarioEmpleado'];
        $contra = $_POST['contra'];
        $correo= $_POST['correo_empleado'];
        return $modeloEmpleado->setSaveEmployee($nombre, $apellido, $telefono, $direccion, $idCiudad,$idRol,$fecha,$estado) && $modeloEmpleado->setSaveUser($estado,$usuario,$contra,$correo,);
        
    }
    
    if(isset($_GET['id_empleado'])){
            $id = $_GET['id_empleado'];
        
            return $modeloEmpleado->setDelete($id);    
    }
?>