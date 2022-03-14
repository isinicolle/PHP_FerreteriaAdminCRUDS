<?php
    
    //Listar Tabla
    function listarProducto(){
        require_once("../modelos/modeloProductos.php");
        $modeloProducto = new modelProducto();
        return $modeloProducto->getProducto();
    }

    //Listar Categorias Activos
    function listarCat(){
        require_once("../modelos/modeloProductos.php");
        $modeloProducto = new modelProducto();
        return $modeloProducto->getCategoria();
    }

    //Listar Marcas Activos
    function listarMar(){
        require_once("../modelos/modeloProductos.php");
        $modeloProducto = new modelProducto();
        return $modeloProducto->getMarca();
    }

    //Listar Proveedores Activos
    function listarProv(){
        require_once("../modelos/modeloProductos.php");
        $modeloProducto = new modelProducto();
        return $modeloProducto->getProveedor();
    }
    
    //Lista una Producto
    function listarUno($id){
        require_once("../modelos/modeloProductos.php");
        $modeloProducto = new modelProducto();
        return $modeloProducto->getProducto();
    }

    //Guardar
    if(isset($_POST['guardar'])){
        require_once("../modelos/modeloProductos.php");
        $modeloProducto = new modelProducto();
        $descripcion_producto = $_POST['descripcion'];
        $id_marca = $_POST['marca'];
        $id_categoria = $_POST['categoria'];
        $id_prov = $_POST['proveedor'];
        $cantidad_por_unidad = $_POST['CU'];
        $costo_producto = $_POST['costo'];
        $precio_actual = $_POST['precio'];
        $stock = $_POST['stock'];
        $descuento = $_POST['descuento'];
        $imagen = $_POST['imagen'];
        Header('Location: ../vistas/productos.php');
        return $modeloProducto->setGuardar($descripcion_producto, $id_marca, $id_categoria, $id_prov, $cantidad_por_unidad,
        $costo_producto, $precio_actual,$stock, $descuento, $imagen);  
    }
    
    //Eliminar
    if(isset($_GET['id_producto'])){
        require_once("../modelos/modeloProductos.php");
        $modeloProducto = new modelProducto();
        $id = $_GET['id_producto'];
        Header('Location: ../vistas/productos.php');
        return $modeloProducto->deleteProducto($id); 
    }

    //Actualizar
    if(isset($_POST['update'])){
        require_once("../modelos/modeloProductos.php");
        $modeloProducto = new modelProducto();
        $id = $_GET['id'];
        $descripcion_producto = $_POST['descripcion'];
        $id_marca = $_POST['marca'];
        $id_categoria = $_POST['categoria'];
        $id_prov = $_POST['proveedor'];
        $cantidad_por_unidad = $_POST['CU'];
        $costo_producto = $_POST['costo'];
        $precio_actual = $_POST['precio'];
        $stock = $_POST['stock'];
        $descuento = $_POST['descuento'];
        $estado = $_POST['estado'];
        $imagen = $_POST['imagen'];
        Header('Location: ../vistas/productos.php');
        return $modeloProducto->setActualizar($id, $descripcion_producto, $id_marca, $id_categoria, $id_prov, $cantidad_por_unidad,
        $costo_producto, $precio_actual,$stock, $descuento, $estado, $imagen);   
    }
    

?>