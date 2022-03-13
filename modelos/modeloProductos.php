<?php
 include_once('../conexion/conexionbd.php');
class ModelProducto {
    
    private $producto;
    private $db;

    public function __construct() {
        $this->producto = array();
        $this->db=new PDO( "sqlsrv:server=andresmunicah.database.windows.net;database=ferreteria_MovilWeb", "adminUnicah", "rootUnicah1");
    }

    public function getMarca(){

        $sql = "SELECT id_marca, descripcion_marca FROM Marcas WHERE estado=1";
        foreach ($this->db->query($sql) as $res) {
            $this->marcas[] = $res;
        }
        return $this->marcas;
        $this->db = null;
    }

    public function getcategoria(){

        $sql = "SELECT id_categoria, descripcion_categoria FROM Categorias WHERE estado=1";
        foreach ($this->db->query($sql) as $res) {
            $this->categorias[] = $res;
        }
        return $this->categorias;
        $this->db = null;
    }

    public function getProveedor(){

        $sql = "SELECT id_prov, nom_prov FROM Proveedores WHERE Estado=1";
        foreach ($this->db->query($sql) as $res) {
            $this->proveedor[] = $res;
        }
        return $this->proveedor;
        $this->db = null;
    }

    public function getProducto(){

        $sql = "SELECT p.id_producto, p.descripcion_producto, m.descripcion_marca, ct.descripcion_categoria, pr.nom_prov, 
            p.cantidad_por_unidad, p.costo_producto, p.precio_actual, p.stock, p.descuento, p.estado, p.imagen FROM productos p 
            JOIN  Marcas m ON p.id_marca = m.id_marca
            JOIN Proveedores pr ON p.id_proveedor = pr.id_prov
            INNER JOIN Categorias ct ON p.id_categoria = ct.id_categoria";
        foreach ($this->db->query($sql) as $res) {
            $this->producto[] = $res;
        }
        return $this->producto;
        $this->db = null;
    }

    public function getProductoId($id){

        $sql = "SELECT p.id_producto, p.descripcion_producto, m.descripcion_marca, ct.descripcion_categoria, pr.nom_prov, 
            p.cantidad_por_unidad, p.costo_producto, p.precio_actual, p.stock, p.descuento, p.estado, p.imagen FROM productos p 
            JOIN  Marcas m ON p.id_marca = m.id_marca
            JOIN Proveedores pr ON p.id_proveedor = pr.id_prov
            INNER JOIN Categorias ct ON p.id_categoria = ct.id_categoria WHERE p.id_producto=$id";
        foreach ($this->db->query($sql) as $res) {
            $this->producto[] = $res;
        }
        return $this->producto;
        $this->db = null;
    }

    public function setGuardar($descripcion_producto, $id_marca, $id_categoria, $id_prov, $cantidad_por_unidad, 
    $costo_producto, $precio_actual, $stock, $descuento, $imagen) {

        $sql = "INSERT INTO Productos(descripcion_producto, id_marca, id_categoria, id_proveedor, cantidad_por_unidad, costo_producto,
        precio_actual, stock, descuento, imagen, estado)
        VALUES('$descripcion_producto','$id_marca','$id_categoria','$id_prov','$cantidad_por_unidad','$costo_producto','$precio_actual',
        '$stock','$descuento','$imagen','1')";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteProducto($id){

        $sql="UPDATE Productos SET Estado = 0 WHERE id_producto=$id";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    
    public function setActualizar($id, $descripcion_producto, $id_marca, $id_categoria, $id_prov, $cantidad_por_unidad, 
    $costo_producto, $precio_actual, $stock, $descuento, $estado, $imagen) {

        $sql = "UPDATE Productos SET descripcion_producto='$descripcion_producto', id_marca='$id_marca', id_categoria='$id_categoria', 
        id_proveedor='$id_prov', cantidad_por_unidad='$cantidad_por_unidad', costo_producto='$costo_producto', precio_actual='$precio_actual', 
        stock='$stock', descuento='$descuento',  estado=$estado, imagen='$imagen' WHERE id_producto='$id'";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>