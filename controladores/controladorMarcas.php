<?php
    
    //Listar Tabla
    function listarMarcas(){
        require_once("../modelos/modeloMarcas.php");
        $modeloMarcas = new ModelMarca();
        return $modeloMarcas->getMarcas();
    }

    //Lista una Categoria
    function listarUno($id){
        require_once("../modelos/modeloMarcas.php");
        $modeloMarcas = new modelMarca();
        return $modeloMarcas->getMarcasId($id);
    }

    //Guardar
    if(isset($_POST['guardar'])){
        require_once("../modelos/modeloMarcas.php");
        $modeloMarcas = new modelMarca();
        $descripcion_marca = $_POST['descripcion'];
        Header('Location: ../vistas/marcas.php');
        return $modeloMarcas->setGuardar($descripcion_marca);  
    }
    
    //Eliminar
    if(isset($_GET['id_marca'])){
        require_once("../modelos/modeloMarcas.php");
        $modeloMarcas = new modelMarca();
        $id = $_GET['id_marca'];
        Header('Location: ../vistas/marcas.php');
        return $modeloMarcas->deleteMarcas($id);    
    }

    //Actualizar
    if(isset($_POST['update'])){
        require_once("../modelos/modeloMarcas.php");
        $modeloMarcas = new modelMarca();
        $id = $_GET['id'];
        $descripcion_marca = $_POST['descripcion'];
        $estado = $_POST['estado'];
        header('Location: ../vistas/marcas.php');
        return $modeloMarcas->setActualizar($id,$descripcion_marca,$estado);  
    }

?>