<?php
    
    //Listar Tabla
    function listarCategorias(){
        require_once("../modelos/modeloCategorias.php");
        $modeloCategorias = new ModelCategoria();
        return $modeloCategorias->getCategorias();
    }

    //Lista una Categoria
    function listarUno($id){
        require_once("../modelos/modeloCategorias.php");
        $modeloCategorias = new ModelCategoria();
        return $modeloCategorias->getCategoriasId($id);
    }

    //Guardar
    if(isset($_POST['guardar'])){
        require_once("../modelos/modeloCategorias.php");
        $modeloCategorias = new ModelCategoria();
        $descripcion_categ = $_POST['descripcion'];
        Header('Location: ../vistas/categorias.php');
        return $modeloCategorias->setGuardar($descripcion_categ);  
    }
    
    //Eliminar
    if(isset($_GET['id_categoria'])){
        require_once("../modelos/modeloCategorias.php");
        $modeloCategorias = new ModelCategoria();
        $id = $_GET['id_categoria'];
        Header('Location: ../vistas/categorias.php');
        return $modeloCategorias->deleteCategorias($id);    
    }

    //Actualizar
    if(isset($_POST['update'])){
        require_once("../modelos/modeloCategorias.php");
        $modeloCategorias = new ModelCategoria();
        $id = $_GET['id'];
        $descripcion_categoria = $_POST['descripcion'];
        $estado = $_POST['estado'];
        header('Location: ../vistas/categorias.php');
        return $modeloCategorias->setActualizar($id,$descripcion_categoria,$estado);  
    }

?>
