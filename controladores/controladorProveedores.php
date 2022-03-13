<?php
    
    //Listar Ciudad
    function listarCiudad(){
        require_once("../modelos/modeloCiudades.php");
        $modeloCiudad = new modelCiudad();
        return $modeloCiudad->getCiudad();
    }

    //Listar Tabla
    function listarProveedor(){
        require_once("../modelos/modeloProveedor.php");
        $modeloProveedor = new modelProveedor();
        return $modeloProveedor->getProveedor();
    }

    //Lista una Categoria
    function listarUno($id){
        require_once("../modelos/modeloProveedor.php");
        $modeloProveedor = new modelProveedor();
        return $modeloProveedor->getProveedorId($id);
    }

    //Guardar
    if(isset($_POST['guardar'])){
        require_once("../modelos/modeloProveedor.php");
        $modeloProveedor = new modelProveedor();
        $nom_prov = $_POST['nom_prov'];
        $telefono_prov = $_POST['telefono_prov'];
        $correo_prov = $_POST['correo_prov'];
        $direccion_prov = $_POST['direccion_prov'];
        $id_ciudad = $_POST['id_ciudad'];
        Header('Location: ../vistas/proveedores.php');
        return $modeloProveedor->setGuardar($nom_prov, $telefono_prov, $correo_prov, $direccion_prov, $id_ciudad);  
    }
    
    //Eliminar
    if(isset($_GET['id_prov'])){
        require_once("../modelos/modeloProveedor.php");
        $modeloProveedor = new modelProveedor();
        $id = $_GET['id_prov'];
        Header('Location: ../vistas/proveedores.php');
        return $modeloProveedor->deleteProveedor($id);    
    }

    //Actualizar
    if(isset($_POST['update'])){
        require_once("../modelos/modeloProveedor.php");
        $modeloProveedor = new modelProveedor();
        $id = $_GET['id'];
        $nom_prov = $_POST['nom_prov'];
        $telefono_prov = $_POST['telefono_prov'];
        $correo_prov = $_POST['correo_prov'];
        $direccion_prov = $_POST['direccion_prov'];
        $id_ciudad = $_POST['id_ciudad'];
        $estado = $_POST['estado'];
        header('Location: ../vistas/proveedores.php');
        return $modeloProveedor->setActualizar($id, $nom_prov, $telefono_prov, $correo_prov, $direccion_prov, $id_ciudad, $estado);  
    }

?>