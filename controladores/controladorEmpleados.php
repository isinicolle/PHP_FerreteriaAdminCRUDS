<?php
    include_once('../modelos/modeloEmpleados.php');
    session_start();
    function listar(){
        $modeloEmpleado = new Empleados();
        return $modeloEmpleado->getEmpleados();
    }
    function listarEmpleado($id){
        $modeloEmpleado = new Empleados();
        return $modeloEmpleado->getEmpleadosById($id);
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
        header('Location: ../vistas/empleados.php');
        return $modeloEmpleado->setSaveEmployee($nombre, $apellido, $telefono, $direccion, $idCiudad,$idRol,$fecha,$estado) && $modeloEmpleado->setSaveUser($estado,$usuario,$contra,$correo,);     
    }
   
    if(isset($_GET['id_empleado'])){
        $id = $_GET['id_empleado'];
        header('Location: ../vistas/empleados.php');
        return $modeloEmpleado->setDelete($id);    
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $fecha = $_POST['fecha'];
        $idCiudad = $_POST['id_ciudad'];
        $idRol = $_POST['id_rol'];
        $estado = $_POST['estado'];
        $usuario = $_POST['usuario'];
        $contra = $_POST['contra'];
        $correo= $_POST['correo'];
        header('Location: ../vistas/empleados.php');
        return $modeloEmpleado->setUpdate($id,$nombre, $apellido,$telefono, $direccion, $idCiudad,$idRol,$fecha,$estado) && $modeloEmpleado->setUpdateUser($id,$estado,$usuario,$contra,$correo);
    }
?>

